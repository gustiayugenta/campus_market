<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('rating_reviews', function (Blueprint $table) {
            // Drop existing unique index on email if it exists
            // $table->dropUnique(['email']);
            // Add composite unique (product_detail_id, email)
            $table->unique(['product_detail_id', 'email'], 'rating_unique_per_product_email');
        });
    }

    public function down(): void
    {
        Schema::table('rating_reviews', function (Blueprint $table) {
            $table->dropUnique('rating_unique_per_product_email');
            // $table->unique('email');
        });
    }
};
