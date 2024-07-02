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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('title_tk');
            $table->string('title_en');
            $table->string('title_ru');
            $table->text('description_tk');
            $table->text('description_en');
            $table->text('description_ru');
            $table->string('news_tk');
            $table->string('news_en');
            $table->string('news_ru');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};