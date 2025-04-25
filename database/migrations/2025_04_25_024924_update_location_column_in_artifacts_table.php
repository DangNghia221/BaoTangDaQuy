<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLocationColumnInArtifactsTable extends Migration
{
    public function up()
    {
        Schema::table('artifacts', function (Blueprint $table) {
            $table->string('location')->default('Unknown')->change();
        });
    }

    public function down()
    {
        Schema::table('artifacts', function (Blueprint $table) {
            $table->string('location')->change(); // Hoặc có thể đặt lại về nullable nếu cần
        });
    }
}
