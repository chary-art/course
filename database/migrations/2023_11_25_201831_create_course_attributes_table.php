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
        Schema::create('course_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->index()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
            $table->string('stage_tk')->nullable();
            $table->string('stage_en')->nullable();
            $table->string('stage_ru')->nullable();
            $table->text('description_tk')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_attributes');
    }
};
