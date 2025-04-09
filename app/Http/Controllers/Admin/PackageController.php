<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;  // Add this line at the top of your controller if it's not already present


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $packages = Package::all();  // Make sure the model is being called properly
    return view('admin.packages.index', compact('packages'));  // Pass the correct variable name
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
	'title'=>'required',
	'description'=>'required'
	]);
	Package::create($request->all());
	return redirect()->route('admin.packages.index')->with('success', 'Packages Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Package $package)
	{
    	return view('admin.packages.edit', compact('package'));
	}


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Package $package)
	{
    	$package->update($request->all());
    	return redirect()->route('admin.packages.index')->with('success', 'Package updated!');
	}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Package $package)
{
    $package->delete();
    return redirect()->route('packages.index')->with('success', 'Package deleted!');
}
}
