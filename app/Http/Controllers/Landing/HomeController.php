<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\HotelFacility;
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
}
