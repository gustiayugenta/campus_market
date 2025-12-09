<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Total produk
        $totalProducts = Product::count();
        $totalProductsLastMonth = Product::whereMonth('created_at', now()->subMonth()->month)->count();
        $productsGrowth = $totalProductsLastMonth > 0 
            ? (($totalProducts - $totalProductsLastMonth) / $totalProductsLastMonth * 100) 
            : 0;

        // Total toko terdaftar
        $totalSellers = Seller::count();
        $totalSellersLastMonth = Seller::whereMonth('created_at', now()->subMonth()->month)->count();
        $sellersGrowth = $totalSellersLastMonth > 0 
            ? (($totalSellers - $totalSellersLastMonth) / $totalSellersLastMonth * 100) 
            : 0;

        // Review & Rating masuk hari ini
        $todayReviews = Rating::whereDate('created_at', today())->count();

        // Kategori aktif
        $activeCategories = Category::has('products')->count();
        $topCategory = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->first();

        // Sebaran produk per kategori
        $productsByCategory = Category::withCount('products')
            ->orderBy('products_count', 'desc')
            ->get();

        // Status penjual
        $activeSellers = Seller::where('is_active', true)->count();
        $inactiveSellers = Seller::where('is_active', false)->count();

        // Sebaran toko per provinsi
        $sellersByRegion = Seller::select('region_id', DB::raw('count(*) as total'))
            ->with('region')
            ->groupBy('region_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'productsGrowth',
            'totalSellers',
            'sellersGrowth',
            'todayReviews',
            'activeCategories',
            'topCategory',
            'productsByCategory',
            'activeSellers',
            'inactiveSellers',
            'sellersByRegion'
        ));
    }
}