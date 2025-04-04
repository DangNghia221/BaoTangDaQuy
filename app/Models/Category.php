<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'user_id'];

    // Quan hệ 1-n với bài viết
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Quan hệ 1-n với người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
