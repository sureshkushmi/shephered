<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Retrieve the authenticated user
        return view('admin.profile.show', compact('user'));
    }
    // Show the profile edit form
    public function edit()
    {
        return view('admin.profile.edit');
    }

    // Update the profile information
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($user->image && Storage::exists('public/profile_images/' . $user->image)) {
                Storage::delete('public/profile_images/' . $user->image);
            }

            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $path = $request->image->storeAs('profile_images', $imageName, 'public');
            $user->image = $imageName;
        }

        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }

    // Delete the profile image
    public function destroy()
    {
        $user = Auth::user();

        if ($user->image && Storage::exists('public/profile_images/' . $user->image)) {
            Storage::delete('public/profile_images/' . $user->image);
            $user->image = null;
            $user->save();
        }

        return redirect()->route('admin.profile.edit')->with('success', 'Profile image deleted successfully.');
    }
}
