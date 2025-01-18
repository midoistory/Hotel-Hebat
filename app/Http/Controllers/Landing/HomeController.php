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
        $roomTypes = roomType::withCount(['rooms' => function($query) {
            $query->where('occupancy', 'available');
        }])->get();

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
}
