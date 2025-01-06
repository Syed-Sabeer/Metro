<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

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

Route::get('/rooms', [ChatController::class, 'getRooms']);
Route::get('/rooms/{roomId}/messages', [ChatController::class, 'getMessages']);
Route::post('/rooms/messages', [ChatController::class, 'sendMessage']);
Route::get('/users', [ChatController::class, 'fetchUsers']);
Route::get('/messages', [ChatController::class, 'fetchMessages']);
Route::post('/messages', [ChatController::class, 'sendMessage']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
