<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    protected $table = 'product_histories'; // Tên bảng trong cơ sở dữ liệu

    // Nếu không sử dụng timestamps (created_at, updated_at)
    public $timestamps = false;

    // Các trường có thể mass-assign
    protected $fillable = [
        'user_id', 'product_id', 'name', 'price', 'image', 'event_date'
    ];
}
