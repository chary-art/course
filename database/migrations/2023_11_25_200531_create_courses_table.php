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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_tk')->nullable();
            $table->string('course_en')->nullable();
            $table->string('course_ru')->nullable();
            $table->string('slug_tk')->unique()->slug()->nullable();
            $table->string('slug_en')->unique()->slug()->nullable();
            $table->string('slug_ru')->unique()->slug()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
