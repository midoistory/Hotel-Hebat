<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::withCount('rooms')->paginate(10);
        return view('dashboard.admin.roomType.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('dashboard.admin.roomType.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:room_types,name|max:255',
            'room_size' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('room_types', 'public')
            : null;

        RoomType::create(array_merge($validatedData, ['image' => $imagePath]));

        return redirect()->route('admin.roomtype.index')->with('success', 'Room type created successfully!');
    }

    public function show($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('dashboard.admin.roomType.view', compact('roomType'));
    }

    public function edit($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('dashboard.admin.roomType.edit', compact('roomType'));
    }

    public function update(Request $request, $id)
    {
        $roomType = RoomType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'room_size' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('room_types', 'public');
            $roomType->image = $imagePath;
        }

        $roomType->name = $request->name;
        $roomType->room_size = $request->room_size;
        $roomType->price = $request->price;
        $roomType->description = $request->description;
        $roomType->save();

        return redirect()->route('admin.roomtype.index')->with('success', 'Room Type updated successfully!');
    }

    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);

        if ($roomType->image) {
            Storage::disk('public')->delete($roomType->image);
        }
        $roomType->delete();

        return redirect()->route('admin.roomtype.index')->with('success', 'Room type deleted successfully!');
    }

}
