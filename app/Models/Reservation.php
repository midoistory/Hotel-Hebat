<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'check_in', 'check_out', 'jumlah_kamar', 'payment_method', 'image', 'notes', 'room_type_id'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
