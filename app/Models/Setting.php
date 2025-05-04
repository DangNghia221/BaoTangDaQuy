<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings'; // Tên bảng trong database

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
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'robots',
        'og_title',
        'og_description',
        'og_image',
        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_image',
    ];

    public $timestamps = false; // Nếu bảng không có cột `created_at` và `updated_at`
}
