<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Artifact extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'artifacts';

    protected $fillable = [
        'name',
        'category',
        'material',
        'age',
        'description',
        'location',
        'image',
        'product_id' // nếu bạn dùng khoá ngoại để liên kết
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
