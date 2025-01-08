<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\Admin\{
    DashboardController,
    RoomController,
    RoomFacilityController,
    HotelFacilityController,
    RoomTypeController,
    AdminSearchController
};
use App\Http\Controllers\Landing\{
    HomeController,
};
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

Route::get('/', [HomeController::class, 'index'])->name('landing.home');
Route::get('/room/{id}', [HomeController::class, 'show'])->name('landing.room.show');

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roomtype', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('roomfacility', RoomFacilityController::class);
    Route::resource('hotelfacility', HotelFacilityController::class);
    Route::get('search', [AdminSearchController::class, 'search'])->name('search');
});
