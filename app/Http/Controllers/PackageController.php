<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
            'description'=>'required|nullable|string',

        ]);
        if($request->hasFile('image'))
        {
            $image      =   $request->file('image');
            //generate a unique name for image
            $imageName   =   time().'-'.$image->getClientOriginalName();
            // Store the image in the public directory (or a specific directory)
            $imagePath = $image->storeAs('images/packages', $imageName, 'public');
            $package    =   new Package();
            $package->title = $validatedData['title'];
            $package->price = $validatedData['price'];
            $package->image = $imagePath;
            $package->description = $validatedData['description'];
            $package->save();
            return redirect()->route('admin.packages.index')->with('success','Packages insert Successfullu');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }
}
