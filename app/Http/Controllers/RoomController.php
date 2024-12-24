<?php

namespace App\Http\Controllers;

use App\Models\Room;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function bookRoom($room_id)
    {
        $room = Room::findOrFail($room_id);

        if ($room->availability) {
            $room->bookRoom();
            return response()->json(['message' => 'Room successfully booked.']);
        }else{
            return response()->json(['message' => 'The room has been booked.'], 400);
        }
    }

    public function releaseRoom($room_id)
    {
        $room = Room::findOrFail($room_id);

        $room->releaseRoom();
        return response()->json(['message' => 'Room available now.']);
    }
}
