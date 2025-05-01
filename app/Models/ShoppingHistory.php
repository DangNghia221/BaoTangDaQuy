<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Thêm dòng này

class ShoppingHistory extends Model
{
    use HasFactory, SoftDeletes; // Thêm SoftDeletes

    protected $fillable = [
        'user_id', 'shops_id', 'quantity', 'price', 'purchased_at', 'status',
    ];

    protected $dates = ['deleted_at']; // Đảm bảo rằng deleted_at được xử lý đúng kiểu ngày

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shops_id');
    }
}
