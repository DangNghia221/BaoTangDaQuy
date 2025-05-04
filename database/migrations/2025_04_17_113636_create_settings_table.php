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
    Schema::create('settings', function (Blueprint $table) {
        $table->id();
        $table->string('site_name')->nullable();
        $table->text('site_description')->nullable();
        $table->text('site_keywords')->nullable();
        $table->string('logo')->nullable();
        $table->string('favicon')->nullable();
        $table->string('sitemap')->nullable();
        $table->boolean('is_active')->default(1); // Hoạt động / bảo trì
        $table->string('site_type')->default('cart'); // cart / simple

        // Thông tin liên hệ
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->text('address')->nullable();
        $table->text('business_info')->nullable();

        // Thông tin SEO
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();
        $table->text('meta_keywords')->nullable();
        $table->string('canonical_url')->nullable();
        $table->string('robots')->nullable();

        // Thông tin mạng xã hội
        $table->string('og_title')->nullable();
        $table->text('og_description')->nullable();
        $table->string('og_image')->nullable();
        $table->string('twitter_card')->nullable();
        $table->string('twitter_title')->nullable();
        $table->text('twitter_description')->nullable();
        $table->string('twitter_image')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
