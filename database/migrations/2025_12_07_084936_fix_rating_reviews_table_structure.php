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
        Schema::table('rating_reviews', function (Blueprint $table) {
            // Drop unique constraint on email
            $table->dropUnique(['email']);
            
            // Make columns nullable
            $table->string('no_telp')->nullable()->change();
            $table->unsignedBigInteger('region_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rating_reviews', function (Blueprint $table) {
            $table->string('email')->unique()->change();
            $table->string('no_telp')->nullable(false)->change();
            $table->unsignedBigInteger('region_id')->nullable(false)->change();
        });
    }
};
