<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showReservationForm(Request $request)
    {
        $roomType = RoomType::find($request->room_type_id);
        return view('landing.form-reservation', compact('roomType'));
    }
}
