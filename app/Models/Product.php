<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes; 

    protected $table = 'products';

    protected $fillable = ['name', 'price', 'quantity', 'description', 'image']; 

    protected $dates = ['deleted_at'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
