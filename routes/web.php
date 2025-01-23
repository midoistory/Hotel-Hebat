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
    ReservationController,
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

// Reservation routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/form-reservation/{id}', [HomeController::class, 'formReservation'])->name('landing.form-reservation');
    Route::get('/resevation/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/user/reservation', [ReservationController::class, 'userReservation'])->name('user.reservation');
});

// Authentication routes
Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roomtype', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('roomfacility', RoomFacilityController::class);
    Route::resource('hotelfacility', HotelFacilityController::class);
    Route::get('search', [AdminSearchController::class, 'search'])->name('search');
});

// Resepsionis routes
Route::prefix('resepsionis')->name('resepsionis.')->middleware(['auth', 'role:resepsionis'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
