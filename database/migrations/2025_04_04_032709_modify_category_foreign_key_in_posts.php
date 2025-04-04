<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Xóa ràng buộc cũ
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete(); // Cập nhật thành null khi xóa
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Khôi phục lại như cũ
        });
    }
};
