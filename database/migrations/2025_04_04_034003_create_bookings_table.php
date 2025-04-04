<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Liên kết với bảng users
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Liên kết với bảng products
            $table->integer('quantity'); // Số lượng vé đặt
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending'); // Trạng thái đặt vé
            $table->timestamp('booking_date')->useCurrent(); // Ngày đặt vé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
