<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number', 'room_type', 'price', 'description', 'image', 'availability',
    ];

    public function bookRoom()
    {
        $this->update(['availability' => false]);
    }

    public function releaseRoom()
    {
        $this->update(['availability' => true]);
    }
}
