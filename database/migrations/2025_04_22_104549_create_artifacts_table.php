<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtifactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifacts', function (Blueprint $table) {
            $table->id(); // Mã hiện vật (auto-increment)
            $table->string('name'); // Tên hiện vật
            $table->string('category'); // Thể loại
            $table->string('material'); // Chất liệu
            $table->string('age'); // Niên đại
            $table->text('description'); // Mô tả
            $table->string('location'); // Vị trí trưng bày
            $table->string('image')->nullable();
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artifacts');
    }
}
