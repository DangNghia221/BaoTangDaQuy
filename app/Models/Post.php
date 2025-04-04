<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'image', 'user_id'];

    // Quan hệ với danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault([
            'name' => 'Không có danh mục'
        ]);
    }
    

    // Quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
