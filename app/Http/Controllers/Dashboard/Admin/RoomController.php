<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(10);
        return view('dashboard.admin.room.index', compact('rooms'));
    }

    public function create()
    {
        return view('dashboard.admin.room.create');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'room_number'   => 'required|unique:rooms,room_number|digits:3',
        'room_type' => 'required|string',
        'price' => 'required|numeric|min:0',
        'occupancy' => 'required|in:Available,Occupied,Maintenance',
        'description'   => 'nullable|string|max:255',
        'image' =>  'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('rooms', 'public');
    }

    Room::create([
        'room_number'   => $validatedData['room_number'],
        'room_type' => $validatedData['room_type'],
        'price' => $validatedData['price'],
        'occupancy' => $validatedData['occupancy'],
        'description'   => $validatedData['description'] ?? null,
        'image' =>  $imagePath ?? null,
    ]);

    return redirect()->route('admin.rooms.index')->with('success', 'Room created successfully!');
    }

    public function show(Room $room)
    {
        return view('dashboard.admin.room.view', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('dashboard.admin.room.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'room_number'   => 'required|unique:rooms,room_number,' . $room->id . '|digits:3',
            'room_type' => 'required|string',
            'price' => 'required|numeric|min:0',
            'occupancy' => 'required|in:Available,Occupied,Maintenance',
            'description'   => 'nullable|string|max:255',
            'image' =>  'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
            $room->update(['image' => $imagePath]);
        }

        $room->update($request->except(['image']));

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('dashboard.admin.room.index')->with('success', 'Room deleted successfully!');
    }
}
