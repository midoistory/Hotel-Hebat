<?php

namespace App\Http\Controllers\Dashboard\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('dashboard.resepsionis.dahboard');
    }

    public function reservation(Request $request)
    {
        $query = $request->input('search');

        $reservations = Reservation::with(['room.roomType', 'user']);

        $reservations = $reservations->paginate(10);
        return view('dashboard.resepsionis.reservation.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        return view('dashboard.resepsionis.reservation.view', compact('reservation'));
    }

    public function print(Reservation $reservation)
    {
        $reservations = $reservation->get();
        return view('dashboard.resepsionis.reservation.print', compact('reservations'));
    }
}

