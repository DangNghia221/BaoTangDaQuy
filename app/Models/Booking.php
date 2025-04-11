<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = ['user_id', 'product_id', 'quantity', 'status', 'price', 'booking_date'];

    
    // Mối quan hệ với Product (Booking thuộc về 1 Product)
    public function product()
    {
        return $this->belongsTo(Product::class);

        return $this->belongsTo(Product::class, 'product_id');
    }

    // Mối quan hệ với User (Booking thuộc về 1 User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
