<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ShopCategory extends Model
{
    protected $fillable = ['name', 'description', 'image'];
    use SoftDeletes;
    public function shops()
    {
        
        return $this->hasMany(Shop::class, 'category_id');
    }
    
}
