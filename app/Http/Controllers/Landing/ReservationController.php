<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showReservationForm(Request $request)
    {
        $roomType = RoomType::find($request->room_type_id);
        return view('landing.form-reservation', compact('roomType'));
    }

    public function create()
    {
        $roomType = RoomType::findOrFail(request('room_type_id'));
        return view('landing.form-reservation', compact('roomType'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'room_type_id' => 'required|exists:room_types,id',
            'jumlah_kamar' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'payment_method' => 'required|in:Ovo,Gopay',
        ]);

        $roomType = RoomType::findOrFail($validated['room_type_id']);
        $days = Carbon::parse($validated['check_in'])->diffInDays(Carbon::parse($validated['check_out']));
        $totalPrice = $roomType->price * $days * $validated ['jumlah_kamar'];

        Reservation::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'check_in' => $validated['check_in'],
        'check_out' => $validated['check_out'],
        'room_type_id' => $validated['room_type_id'],
        'jumlah_kamar' => $validated['jumlah_kamar'],
        'total_price' => $totalPrice,
        'payment_method' => $validated['payment_method'],
        'image' => $request->file('image')->store('reservations'),
        'notes' => $request->input('notes', null),
        'status' => 'Pending',
    ]);

    return response()->json(['message' => 'Reservasi anda berhasil dibuat!'], 201);
    }
}
