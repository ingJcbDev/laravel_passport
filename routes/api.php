<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Sin autenticacion
// Route::get('posts', function() {
//     return \App\Models\Post::all();
// });

// Con autenticacion
Route::get('posts', function() {
    try {
    return \App\Models\Post::all();
    } catch (\Exception $e) {
        Log::error($e->getMessage()); // Registrar el error en el registro de Laravel
        return response(['error' => $e->getMessage()]);
    }
})->middleware('auth:api');

// Con middleware client
Route::get('clients/posts', function() {
    try {
    return \App\Models\Post::all();
    } catch (\Exception $e) {
        Log::error($e->getMessage()); // Registrar el error en el registro de Laravel
        return response(['error' => $e->getMessage()]);
    }
})->middleware('client');

Route::post('clients/posts', function(Request $request) {
    try {
        \App\Models\Post::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'color' => $request->input('color'),
        'phone' => $request->input('phone'),
        'author' => $request->input('author'),
        'author_age' => $request->input('author_age'),
        ]);

        return response(['status' => 200], 200);
    } catch (\Exception $e) {
        Log::error($e->getMessage()); // Registrar el error en el registro de Laravel
        return response(['error' => $e->getMessage()]);
    }
})->middleware('client');
