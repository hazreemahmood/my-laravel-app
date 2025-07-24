<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
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
            $fileUrl = asset('storage/' . $path);
            $fileType = $request->file('file')->getMimeType();

            // ✅ Save to database
            $chat = ChatMessage::create([
                'user' => $request->input('user') ?? 'Anonymous',
                'message' => '📎 Uploaded: ' . $request->file('file')->getClientOriginalName(),
                'file_url' => $fileUrl,
                'file_type' => $fileType,
            ]);

            return response()->json([
                'fileUrl' => $fileUrl,
                'fileType' => $fileType
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
