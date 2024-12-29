<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $rooms = Room::query();

        if ($query){
            $rooms->where('room_number', 'like', "%$query%")
            ->orWhere('occupancy', 'like', "%$query%");
        }

        $rooms = $rooms->with('roomType:id,name')->paginate(10);

        return view('dashboard.admin.room.index', compact('rooms'));
    }

    public function create()
    {
        $roomTypes = RoomType::select('id', 'name')->get();
        return view('dashboard.admin.room.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->roomValidationRules());

        Room::create($validatedData);

        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function show(Room $room)
    {
        return view('dashboard.admin.room.view', compact('room'));
    }

    public function edit(Room $room)
    {
        $roomTypes = RoomType::select('id', 'name')->get();
        return view('dashboard.admin.room.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate($this->roomValidationRules($room->id));

        $room->update($validatedData);

        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil diperbarui!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Ruangan berhasil dihapus!');
    }

    private function roomValidationRules($id = null)
    {
        return [
            'room_number'   => 'required|unique:rooms,room_number,' . $id . '|digits:3',
            'room_type_id' => 'required|exists:room_types,id',
            'occupancy' => 'required|in:Available,Occupied,Maintenance',
        ];
    }
}
