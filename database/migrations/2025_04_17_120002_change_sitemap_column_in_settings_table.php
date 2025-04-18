<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSitemapColumnInSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('sitemap')->nullable()->change(); // ✅ thêm nullable()
        });
    }

    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('sitemap', 255)->nullable()->change(); // để rollback không lỗi
        });
    }
}
