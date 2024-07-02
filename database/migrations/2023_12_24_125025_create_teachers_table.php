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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->string('major_tk')->nullable();
            $table->string('major_en')->nullable();
            $table->string('major_ru')->nullable();
            $table->string('experience_tk')->nullable();
            $table->string('experience_en')->nullable();
            $table->string('experience_ru')->nullable();
            $table->string('degree_tk')->nullable();
            $table->string('degree_en')->nullable();
            $table->string('degree_ru')->nullable();
            $table->string('hobby_tk')->nullable();
            $table->string('hobby_en')->nullable();
            $table->string('hobby_ru')->nullable();
            $table->string('address_tk')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ru')->nullable();
            $table->unsignedBigInteger('course_id')->index()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
