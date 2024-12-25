<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = roomfacility::all();
        return view('dashboard.admin.roomfacility.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.roomfacility.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        roomfacility::create($request->all());
        return redirect()->route('dashboard.admin.roomfacility.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(roomfacility $roomfacility)
    {
        return view('dashboard.admin.roomfacility.view', compact('roomfacility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(roomfacility $roomfacility)
    {
        return view('dashboard.admin.roomfacility.edit', compact('roomfacility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, roomfacility $roomfacility)
    {
        $roomfacility->update($request->all());
        return redirect()->route('dashboard.admin.roomfacility.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomfacility->delete();
        return redirect()->route('dashboard.admin.roomfacility.index');
    }
}
