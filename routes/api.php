<?php

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// routes/api.php
Route::post('/store-message', function (Request $request) {
    ChatMessage::create($request->only('user', 'message', 'file_url', 'file_type'));
    return response()->json(['status' => 'saved']);
});