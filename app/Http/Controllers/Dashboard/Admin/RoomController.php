<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('roomType')->paginate(10);
        return view('dashboard.admin.room.index', compact('rooms'));
    }

    public function create()
    {
        $roomTypes = RoomType::all();
        return view('dashboard.admin.room.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room_number'   => 'required|unique:rooms,room_number|digits:3',
            'room_type_id' => 'required|exists:room_types,id',
            'occupancy' => 'required|in:Available,Occupied,Maintenance',
        ]);

        Room::create([
            'room_number'   => $validatedData['room_number'],
            'room_type_id' => $validatedData['room_type_id'],
            'occupancy' => $validatedData['occupancy'],
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');
    }

    public function show(Room $room)
    {
        return view('dashboard.admin.room.view', compact('room'));
    }

    public function edit(Room $room)
    {
        $roomTypes = RoomType::all();
        return view('dashboard.admin.room.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'room_number'   => 'required|unique:rooms,room_number,' . $room->id . '|digits:3',
            'room_type_id' => 'required|exists:room_types,id',
            'occupancy' => 'required|in:Available,Occupied,Maintenance',
        ]);

        $room->update([
            'room_number' => $validatedData['room_number'],
            'room_type_id' => $validatedData['room_type_id'],
            'occupancy' => $validatedData['occupancy'],
        ]);

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully!');
    }
}
