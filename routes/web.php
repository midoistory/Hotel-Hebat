<?php

use App\Http\Controllers\RoomController;
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

// Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
});

// Resepsionis
Route::middleware(['auth', 'role:resepsionis'])->group(function () {
    Route::get('/resepsionis/dashboard', [ResepsionisController::class, 'index']);
});

// Tamu
Route::middleware(['auth', 'role:tamu'])->group(function () {
    Route::get('/hotelhebat', [TamuController::class, 'index']);
});

Route::post('/room/{room_id}/book', [RoomController::class, 'bookRoom']);
Route::post('/room/{room_id}/release', [RoomController::class, 'releaseRoom']);
