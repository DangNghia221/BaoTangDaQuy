<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'image', 'category_id'];

    protected $dates = ['deleted_at']; // để Eloquent xử lý cột này tự động

    public function category()
    {
        return $this->belongsTo(ShopCategory::class, 'category_id');
    }
    public function restore($id)
{
    $item = Shop::onlyTrashed()->findOrFail($id);
    $item->restore();

    return redirect()->route('shop.trashed')->with('success', 'Khôi phục sản phẩm thành công!');
}

}
