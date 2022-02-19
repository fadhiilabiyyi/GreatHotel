<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{   
    use HasFactory;
        
    protected $guarded = ['id'];

    public function bookings()
    {
        return $this->hasMany('room_types');
    }

    public function facility()
    {
        return $this->belongsTo('facilities');
    }
}
