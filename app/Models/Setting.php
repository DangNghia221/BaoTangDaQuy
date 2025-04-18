<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings'; // Nếu tên bảng trong DB là `settings`

    protected $fillable = [
        'site_name',
        'site_description',
        'site_keywords',
        'logo',
        'favicon',
        'sitemap',
        'is_active',
        'site_type',
        'email',
        'phone',
        'address',
        'business_info',
    ];

    public $timestamps = false; // Nếu bảng không có cột `created_at` và `updated_at`
}
