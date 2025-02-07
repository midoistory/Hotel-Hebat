<?php

namespace App\Http\Controllers\Dashboard\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ResepsionisSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('search');

        $reservations = Reservation::with(['room.roomType', 'user'])
        ->where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('check_in', 'like', "%$query%")
            ->orWhere('check_out', 'like', "%$query%")
            ->paginate(10);

        return view('dashboard.resepsionis.reservation.index', compact('reservations', 'query'));
    }

    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $query = Reservation::query();

        if ($start_date) {
            $query->whereDate('check_in', '>=', $start_date);
        }

        if ($end_date) {
            $query->whereDate('check_out', '<=', $end_date);
        }

        $reservations = $query->paginate(10);

        return view('dashboard.resepsionis.reservation.index', compact('reservations'));
    }

}
