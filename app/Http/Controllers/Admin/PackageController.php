<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
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
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Create a new Package instance
        $package = new Package();

        // Set the package properties
        $package->title = $validatedData['title'];
        $package->price = $validatedData['price'];
        $package->description = $validatedData['description'];

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->extension();
        
            // Store the image in the 'public/images/package' directory
            $path = $request->image->storeAs('images/package', $imageName, 'public');
        
            // Save the relative path to the image in the database
            $package->image = $path;
        }

        // Save the package to the database
        $package->save();

        // Redirect with a success message
        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
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
   public function edit($id)
	{
        $package = Package::findOrFail($id);
    	return view('admin.packages.edit', compact('package'));
	}


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
	{
         // Validate the incoming request
         $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        // Find the existing package
        $package = Package::findOrFail($id);

        // Update package properties
        $package->title = $validatedData['title'];
        $package->price = $validatedData['price'];
        $package->description = $validatedData['description'];

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($package->image && Storage::exists('public/' . $package->image)) {
                Storage::delete('public/' . $package->image);
            }

            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $path = $request->image->storeAs('images/package', $imageName, 'public');
            $package->image = $path;
        }

        // Save the updated package
        $package->save();

        // Redirect with a success message
        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
	}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $package = Package::findOrFail($id);
    // Delete the associated image file if it exists
    if ($package->image && Storage::exists('public/' . $package->image)) {
        Storage::delete('public/' . $package->image);
    }

    $package->delete();
    return redirect()->route('admin.packages.index')->with('success', 'Package deleted!');
}
}
