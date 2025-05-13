<?php

// app/Http/Controllers/Admin/PageController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Show form for creating a new page
    public function create()
    {
        return view('admin.page.create');
    }

    // Store a new page
    public function store(Request $request)
    {
        Page::create($request->only(['slug', 'title', 'content']));


        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    // Edit a page
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    // Update a page
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->update($request->all());

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    // List all pages
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index', compact('pages'));
    }
}
