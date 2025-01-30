<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\RoomType;
use App\Models\User;
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

    public function store(Request $request)
    {
        $validatedData = $request->validate($this->reservationValidationRules());

        $roomType = RoomType::findOrFail($validatedData['room_type_id']);
        $availableRooms = $roomType->rooms()->where('occupancy', 'available')->count();

        // Validasi jumlah kamar yang dipesan
        if ($validatedData['jumlah_kamar'] > $availableRooms) {
            return back()->withErrors(['jumlah_kamar' => 'Jumlah kamar yang tersedia hanya ' . $availableRooms . '.']);
        }

        // Batasi maksimal pemesanan 5 kamar
        if ($validatedData['jumlah_kamar'] > 5) {
            return back()->withErrors(['jumlah_kamar' => 'Pesan lebih dari 5 kamar? Silakan hubungi pihak hotel.']);
        }

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('reservations', 'public')
            : null;

        $days = Carbon::parse($validatedData['check_in'])->diffInDays(Carbon::parse($validatedData['check_out']));
        $totalPrice = $roomType->price * $days * $validatedData['jumlah_kamar'];

        Reservation::create(array_merge($validatedData, [
            'image' => $imagePath,
            'total_price' => $totalPrice,
            'user_id'   => auth()->id(),
            'status'    => 'pending',
        ]));

        return redirect()->route('landing.home')->with('success', 'Reservasi berhasil dibuat! Lihat pesanan Anda.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->route('user.reservation')->with('success', 'Reservasi berhasil dibatalkan.');
    }

    private function reservationValidationRules()
    {
        return [
            'room_type_id' => 'required|exists:room_types,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'jumlah_kamar' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'payment_method' => 'required|in:ovo,gopay',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function userReservation(Request $request)
    {
        $reservations = Reservation::where('user_id', auth()->id())->get();

        return view('user.reservation', compact('reservations'));
    }

    public function userReservationDetail($id)
    {
        $users = User::findOrFail(auth()->id());
        $reservations = Reservation::where('id', $id)
        ->where('user_id', auth()->id())
        ->firstOrFail();

        return view('user.reservation-receipt', compact('reservations', 'users'));
    }
}

