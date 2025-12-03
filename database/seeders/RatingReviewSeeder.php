<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('rating_reviews')->insert([
            ['id'=>1, 'name'=>'User A', 'email'=>'usera@example.com', 'no_telp'=>'081234567890', 'rating'=>5, 'review'=>'Produk sangat berkualitas dan sesuai deskripsi.', 'product_detail_id'=>1, 'region_id'=>1, 'created_at' => now(), 'updated_at' => now()],
            ['id'=>2, 'name'=>'User B', 'email'=>'userb@example.com', 'no_telp'=>'082345678901', 'rating'=>4, 'review'=>'Pengiriman cepat, produk dalam kondisi baik.', 'product_detail_id'=>2, 'region_id'=>2, 'created_at' => now(), 'updated_at' => now()],
            ['id'=>3, 'name'=>'User C', 'email'=>'userc@example.com', 'no_telp'=>'083456789012', 'rating'=>3, 'review'=>'Produk oke, tapi kemasan kurang rapi.', 'product_detail_id'=>3, 'region_id'=>3, 'created_at' => now(), 'updated_at' => now()],
            ['id'=>4, 'name'=>'User D', 'email'=>'userd@example.com', 'no_telp'=>'084567890123', 'rating'=>5, 'review'=>'Sangat puas dengan kualitas produk ini!', 'product_detail_id'=>4, 'region_id'=>4, 'created_at' => now(), 'updated_at' => now()],
            ['id'=>5, 'name'=>'User E', 'email'=>'usere@example.com', 'no_telp'=>'085678901234', 'rating'=>2, 'review'=>'Produk tidak sesuai harapan.', 'product_detail_id'=>5, 'region_id'=>5, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
