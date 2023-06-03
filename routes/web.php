<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatRoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/chatroom', function () {
//     // return view('chatroom');
//     Route::get('/chatroom', [ChatRoomController::class, 'index']);

// })->middleware(['auth', 'verified'])->name('chatroom');

Route::middleware('auth')->group(function () {
    Route::get('/chatroom', [ChatRoomController::class, 'index'])->name('chatroom.index');
    Route::get('/chatroom/{id}', [ChatRoomController::class, 'show'])->name('chatroom.show');
    Route::post('/chatroom/{id}', [ChatRoomController::class, 'post'])->name('chatroom.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
