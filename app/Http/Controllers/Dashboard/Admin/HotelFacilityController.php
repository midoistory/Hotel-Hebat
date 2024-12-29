<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotelFacilities = HotelFacility::paginate(10);
        return view('dashboard.admin.hotelFacility.index', compact('hotelFacilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.hotelFacility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',

        ]);

        $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('hotel_facility', 'public')
        : null;

        HotelFacility::create(array_merge($validatedData, ['image' => $imagePath]));

        return redirect()->route('admin.hotelfacility.index')->with('success', 'Fasilitas hotel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotelFacility = HotelFacility::findOrFail($id);
        return view('dashboard.admin.hotelFacility.view', compact('hotelFacility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $hotelFacility = HotelFacility::findOrFail($id);
        return view('dashboard.admin.hotelFacility.edit', compact('hotelFacility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hotelFacility = HotelFacility::findOrFail($id);

       $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($hotelFacility->image) {
                Storage::disk('public')->delete($hotelFacility->image);
            }
            $validatedData['image'] = $request->file('image')->store('hotel_facility', 'public');
        }

        $hotelFacility->update($validatedData);

        return redirect()->route('admin.hotelfacility.index')->with('success', 'Fasilitas hotel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotelFacility = HotelFacility::findOrFail($id);

        if ($hotelFacility->image) {
            Storage::disk('public')->delete($hotelFacility->image);
        }

        $hotelFacility->forceDelete();
        return redirect()->route('admin.hotelfacility.index')->with('success', 'Fasilitas hotel berhasil dihapus.');
    }
}
