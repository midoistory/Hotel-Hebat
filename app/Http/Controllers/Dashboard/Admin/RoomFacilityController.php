<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomFacility;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');

        $roomFacilities = RoomFacility::query();

        if ($query) {
        $roomFacilities->where('kamar', 'like', "%$query%")
            ->orWhere('perlengkapan_tidur', 'like', "%$query%")
            ->orWhere('umum', 'like', "%$query%")
            ->orWhere('makan', 'like', "%$query%")
            ->orWhere('media', 'like', "%$query%")
            ->orWhere('kamar_mandi', 'like', "%$query%");
    }

        $roomFacilities = $roomFacilities->with('roomType:id,name')->paginate(10);

        return view('dashboard.admin.roomFacility.index', compact('roomFacilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomTypes = RoomType::select('id', 'name')->get();
        $usedRoomTypes = RoomFacility::pluck('room_type_id')->toArray();
        return view('dashboard.admin.roomFacility.create', compact('roomTypes', 'usedRoomTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usedRoomTypes = RoomFacility::pluck('room_type_id')->toArray();

        $validatedData = $request->validate([
            'room_type_id' => [
                'required',
                'exists:room_types,id',
                function ($attribute, $value, $fail) use ($usedRoomTypes) {
                    if (in_array($value, $usedRoomTypes)) {
                        $fail('Fasilitas untuk tipe ruangan ini sudah dibuat.');
                    }
                },
            ],
            'kamar' => 'nullable|string',
            'perlengkapan_tidur' => 'nullable|string',
            'umum' => 'nullable|string',
            'makan' => 'nullable|string',
            'media' => 'nullable|string',
            'kamar_mandi' => 'nullable|string',
        ]);

        RoomFacility::create($validatedData);

        return redirect()->route('admin.roomfacility.index')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $roomFacility = RoomFacility::findOrFail($id);
        $roomTypes = RoomType::select('id', 'name')->get();
        return view('dashboard.admin.roomFacility.view', compact('roomFacility', 'roomTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roomFacility = RoomFacility::findOrFail($id);
        $roomTypes = RoomType::select('id', 'name')->get();
        $usedRoomTypes = RoomFacility::where('id', '!=', $id)->pluck('room_type_id')->toArray();
        return view('dashboard.admin.roomFacility.edit', compact('roomFacility', 'roomTypes', 'usedRoomTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roomFacility = RoomFacility::findOrFail($id);
        $usedRoomTypes = RoomFacility::where('id', '!=', $roomFacility->id)->pluck('room_type_id')->toArray();

        $validatedData = $request->validate([
            'room_type_id' => [
                'required',
                'exists:room_types,id',
                function ($attribute, $value, $fail) use ($usedRoomTypes) {
                    if (in_array($value, $usedRoomTypes)) {
                        $fail('Fasilitas untuk tipe ruangan ini sudah dibuat.');
                    }
                },
            ],
            'kamar' => 'nullable|string',
            'perlengkapan_tidur' => 'nullable|string',
            'umum' => 'nullable|string',
            'makan' => 'nullable|string',
            'media' => 'nullable|string',
            'kamar_mandi' => 'nullable|string',
        ]);

        $roomFacility->update($validatedData);

        return redirect()->route('admin.roomfacility.index')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roomFacility = RoomFacility::findOrFail($id);
        $roomFacility->delete();
        return redirect()->route('admin.roomfacility.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
