<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    RoomType,
    Room,
    RoomFacility,
    HotelFacility
};
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('search');

    // Check Room Types
    $roomTypesCount = RoomType::where('name', 'like', "%$query%")
        ->orWhere('room_size', 'like', "%$query%")
        ->orWhere('price', 'like', "%$query%")
        ->orWhere('description', 'like', "%$query%")
        ->count();

    if ($roomTypesCount > 0) {
        return redirect()->route('admin.roomtype.index', ['search' => $query]);
    }

    // Check Rooms
    $roomsCount = Room::where('room_number', 'like', "%$query%")
        ->orWhere('occupancy', 'like', "%$query%")
        ->count();

    if ($roomsCount > 0) {
        return redirect()->route('admin.rooms.index', ['search' => $query]);
    }

    // Check Room Facilities
    $roomFacilitiesCount = RoomFacility::where('kamar', 'like', "%$query%")
        ->orWhere('perlengkapan_tidur', 'like', "%$query%")
        ->orWhere('umum', 'like', "%$query%")
        ->orWhere('makan', 'like', "%$query%")
        ->orWhere('media', 'like', "%$query%")
        ->orWhere('kamar_mandi', 'like', "%$query%")
        ->count();

    if ($roomFacilitiesCount > 0) {
        return redirect()->route('admin.roomfacility.index', ['search' => $query]);
    }

    // Check Hotel Facilities
    $hotelFacilitiesCount = HotelFacility::where('name', 'like', "%$query%")
        ->orWhere('description', 'like', "%$query%")
        ->count();

    if ($hotelFacilitiesCount > 0) {
        return redirect()->route('admin.hotelfacility.index', ['search' => $query]);
    }

    return back()->with('error', 'Data tidak ditemukan.');
}
}
