<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\HotelFacility;
use App\Models\Room;
use App\Models\RoomFacility;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        $hotelFacilities = HotelFacility::all();

        return view('landing.home', compact('roomTypes', 'hotelFacilities'));
    }

    public function show($id)
    {
        $roomType = RoomType::findOrFail($id);
        $roomFacilities = RoomFacility::where('room_type_id', $id)->get();

        return view('landing.room', compact('roomType', 'roomFacilities'));
    }

    public function formReservation($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('landing.form-reservation', compact('roomType'));
    }

    // public function checkAvailability(Request $request)
    // {
    //     $request->validate([
    //         'checkIn' => 'required|date',
    //         'checkOut' => 'required|date|after:checkIn',
    //         'jumlahKamar' => 'required|integer|min:1',
    //     ]);

    //     $checkIn = $request->checkIn;
    //     $checkOut = $request->checkOut;
    //     $jumlahKamar = $request->jumlahKamar;

    //     // Cek ketersediaan kamar berdasarkan tipe
    //     $availableRoomTypes = RoomType::with(['rooms' => function ($query) use ($checkIn, $checkOut) {
    //         $query->where('occupancy', 'Available')
    //             ->whereDoesntHave('reservations', function ($reservationQuery) use ($checkIn, $checkOut) {
    //                 $reservationQuery->whereBetween('check_in', [$checkIn, $checkOut])
    //                     ->orWhereBetween('check_out', [$checkIn, $checkOut]);
    //             });
    //     }])->get();

    //     // Filter tipe kamar dengan jumlah kamar tersedia sesuai permintaan
    //     $filteredRoomTypes = $availableRoomTypes->filter(function ($roomType) use ($jumlahKamar) {
    //         return $roomType->rooms->count() >= $jumlahKamar;
    //     });

    //     if ($filteredRoomTypes->isEmpty()) {
    //         return response()->json(['message' => 'Kamar tidak tersedia untuk jumlah yang diminta.'], 404);
    //     }

    //     // Kirimkan daftar tipe kamar yang tersedia
    //     return response()->json([
    //         'message' => 'Kamar tersedia:',
    //         'roomTypes' => $filteredRoomTypes->pluck('name'), // Ambil nama tipe kamar
    //     ], 200);
    // }
}
