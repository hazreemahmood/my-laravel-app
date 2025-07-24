<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{ // app/Http/Controllers/ChatController.php
    public function index()
    {
        return view('chat');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            return response()->json([
                'fileUrl' => asset('storage/' . $path),
                'fileType' => $request->file('file')->getMimeType()
            ]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
