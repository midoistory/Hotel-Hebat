<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFacility extends Model
{
    use HasFactory;

    protected $fillable = [
    'room_type_id',
    'kamar',
    'perlengkapan_tidur',
    'umum',
    'makan',
    'media',
    'kamar_mandi',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
