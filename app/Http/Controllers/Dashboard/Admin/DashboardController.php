<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tersedia = Room::where('occupancy', 'available')->count();
        $terisi = Room::where('occupancy', 'Occupied')->count();
        $pemeliharaan = Room::where('occupancy', 'Maintenance')->count();

        return view('dashboard.admin.dashboard', [
            'tersedia' => $tersedia,
            'terisi' => $terisi,
            'pemeliharaan' => $pemeliharaan,
            'totalKamar' => $tersedia + $terisi + $pemeliharaan,
        ]);
    }
}
