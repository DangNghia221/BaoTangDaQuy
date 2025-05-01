<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToShoppingHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('shopping_histories', function (Blueprint $table) {
            $table->softDeletes(); // Thêm cột deleted_at
        });
    }

    public function down()
    {
        Schema::table('shopping_histories', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Xóa cột deleted_at nếu cần rollback
        });
    }
}
