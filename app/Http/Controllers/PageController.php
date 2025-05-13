<?php

// app/Http/Controllers/Admin/PageController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
{
    $page = Page::where('slug', $slug)->where('status', 'active')->firstOrFail();
    return view('pages.page', compact('page'));
}
}
