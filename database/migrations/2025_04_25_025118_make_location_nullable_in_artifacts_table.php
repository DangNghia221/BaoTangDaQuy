<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeLocationNullableInArtifactsTable extends Migration
{
    public function up()
    {
        Schema::table('artifacts', function (Blueprint $table) {
            $table->string('location')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('artifacts', function (Blueprint $table) {
            $table->string('location')->nullable(false)->change(); // Nếu muốn trả lại như cũ
        });
    }
}
