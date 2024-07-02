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
        Schema::table('user', function (Blueprint $table) {
            $table->string('surname')->after('name')->nullable();
            $table->boolean('is_admin')->after('email')->default(false);
            $table->unsignedBigInteger('role_id')->after('is_admin')->index()->nullable();
            $table->foreign('role_id')->references('id' )->on('roles')->cascadeOnDelete();
            $table->string('image')->after('role_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
};
