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
        $validatedData = $request->validate($this->roomTypeValidationRules());

        $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('room_types', 'public')
        : null;

        RoomType::create(array_merge($validatedData, ['image' => $imagePath]));

        return redirect()->route('admin.roomtype.index')->with('success', 'Tipe Ruangan berhasil ditambahkan!');
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

        $validatedData = $request->validate($this->roomTypeValidationRules());

        if ($request->hasFile('image')) {
            if ($roomType->image) {
                Storage::disk('public')->delete($roomType->image);
            }
            $validatedData['image'] = $request->file('image')->store('room_types', 'public');
        }

        $roomType->update($validatedData);

        return redirect()->route('admin.roomtype.index')->with('success', 'Tipe ruangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $roomType = RoomType::findOrFail($id);

        if ($roomType->image) {
            Storage::disk('public')->delete($roomType->image);
        }
        $roomType->delete();

        return redirect()->route('admin.roomtype.index')->with('success', 'Tipe ruangan berrhasil dihapus.');
    }

    private function roomTypeValidationRules($id = null)
    {
        return [
            'name' => 'required|string|max:255' . $id,
            'room_size' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
