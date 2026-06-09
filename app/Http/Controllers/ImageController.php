<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display the image upload form and gallery.
     */
    public function index(Request $request)
    {
        $images = [];
        $uploadDir = public_path('uploads/images');
        $openUpload = $request->query('upload', 0);
        
        if (is_dir($uploadDir)) {
            $files = array_diff(scandir($uploadDir), ['.', '..']);
            $files = array_values($files);
            
            foreach ($files as $file) {
                $filePath = $uploadDir . '/' . $file;
                $images[] = [
                    'url' => asset('uploads/images/' . $file),
                    'name' => $file,
                    'size' => filesize($filePath),
                    'last_modified' => filemtime($filePath),
                ];
            }
            
            // Sort by newest first
            usort($images, function($a, $b) {
                return $b['last_modified'] - $a['last_modified'];
            });
        }

        return view('pages.gallery', compact('images', 'openUpload'));
    }

    /**
     * Store a newly uploaded image.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/images'), $filename);
            
            return response()->json([
                'success' => true,
                'url' => asset('uploads/images/' . $filename),
                'message' => 'Image uploaded successfully!'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No image uploaded.'], 400);
    }

    /**
     * Remove the specified image.
     */
    public function destroy(Request $request)
    {
        $request->validate(['filename' => 'required|string']);
        
        $filePath = public_path('uploads/images/' . $request->filename);
        
        if (file_exists($filePath)) {
            unlink($filePath);
            return response()->json(['success' => true, 'message' => 'Image deleted.']);
        }
        
        return response()->json(['success' => false, 'message' => 'Image not found.'], 404);
    }
}
