<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'price'];
    
    // Mối quan hệ ngược lại với Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
