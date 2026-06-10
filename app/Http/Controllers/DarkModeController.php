<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarkModeController extends Controller
{
    public function toggle(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $user->dark_mode = !$user->dark_mode;
            $user->save();
            return response()->json([
                'success' => true,
                'dark_mode' => $user->dark_mode
            ]);
        }
        return response()->json(['success' => false], 401);
    }
}