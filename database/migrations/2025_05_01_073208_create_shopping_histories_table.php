<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('shopping_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // người dùng
            $table->unsignedBigInteger('shops_id')->nullable();
            $table->integer('quantity')->default(1); // số lượng mua
            $table->decimal('price', 10, 2)->default(0); // giá mua lúc đó
            $table->dateTime('purchased_at'); // thời gian mua
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('shops_id')->references('id')->on('shops')->onDelete('set null');        });
    }

    public function down()
    {
        Schema::dropIfExists('shopping_histories');
    }
}
