<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show($id = null)
    {
        $user = $id ? User::findOrFail($id) : auth()->user();
        return view('pages.user-profile', compact('user'));
    }

    public function update(Request $request, $id = null)
    {
        $user = $id ? User::findOrFail($id) : auth()->user();

        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore($user->id)],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048']
        ]);

        $updateData = [
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $file->getClientOriginalName());
            
            // Ensure upload directory exists
            $uploadDir = public_path('uploads/avatars');
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            // Delete old photo if exists
            if ($user->photo && file_exists(public_path('uploads/avatars/' . $user->photo))) {
                unlink(public_path('uploads/avatars/' . $user->photo));
            }
            
            $file->move($uploadDir, $filename);
            $updateData['photo'] = $filename;
        }

        $user->update($updateData);

        return back()->with('succes', 'Profile successfully updated');
    }
}