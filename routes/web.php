<?php

use App\Http\Controllers\Dashboard\Admin\{
    DashboardController,
    RoomController,
    RoomFacilityController,
    RoomTypeController
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

Route::get('/', function () {
    return view('welcome');
});

// // Admin
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index']);
// });

Route::prefix('hotel-hebat/admin')->name('admin.')->group(function() {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Room
    Route::resource('roomtype', RoomTypeController::class);

    // Room
    Route::resource('rooms', RoomController::class);

    // Room Facility
    Route::resource('roomfacility', RoomFacilityController::class);

    // // Hotel Facility
    // Route::resource('hotelfacility', HotelFacilityController::class);
});
