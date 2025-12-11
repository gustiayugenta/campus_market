<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'seller_id',
        'category_id',
        'name',
        'description',
        'price',
        'stock',
        'image',
        'is_active'
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Detail variants/descriptions for a product
    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'product_id');
    }

    // TAMBAHKAN relasi ini untuk mengakses ratings
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'product_detail_id');
    }

    // Query scope: only active products
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}