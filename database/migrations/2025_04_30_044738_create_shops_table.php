<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('shops', function (Blueprint $table) {
        $table->id();
        $table->string('name');              // Tên sản phẩm
        $table->text('description')->nullable(); // Mô tả
        $table->decimal('price', 10, 2);     // Giá sản phẩm
        $table->string('image')->nullable(); // Ảnh
        $table->foreignId('category_id')->constrained('shop_categories')->onDelete('cascade'); // Liên kết thể loại
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
