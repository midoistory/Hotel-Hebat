<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_type_id', 'check_in', 'check_out', 'jumlah_kamar',
        'total_price', 'name', 'email', 'phone', 'payment_method',
        'image', 'notes', 'status'
    ];


    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
