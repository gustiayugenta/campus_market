<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Redirect;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_detail_id' => ['required','integer','exists:product_details,id'],
            'name'              => ['required','string','max:255'],
            'email'             => ['required','email','max:255'],
            'no_telp'           => ['nullable','string','max:50'],
            'provinsi'          => ['nullable','string','max:100'],
            'rating'            => ['required','integer','min:1','max:5'],
            'review'            => ['nullable','string','max:2000'],
        ]);

        // Enforce one rating per product_detail per email
        $exists = Rating::where('product_detail_id', $data['product_detail_id'])
            ->where('email', $data['email'])
            ->exists();
        if ($exists) {
            return Redirect::back()->with('error', 'Satu email hanya bisa memberikan 1 ulasan pada produk ini.');
        }

        // Persist rating
        Rating::create([
            'product_detail_id' => $data['product_detail_id'],
            'name'   => $data['name'],
            'email'  => $data['email'],
            'no_telp'=> $data['no_telp'] ?? null,
            'provinsi' => $data['provinsi'] ?? null,
            'rating' => $data['rating'],
            'review' => $data['review'] ?? null,
        ]);

        // Redirect back to product detail
        $detail = ProductDetail::find($data['product_detail_id']);
        $productId = $detail ? $detail->product_id : null;
        return Redirect::route('products.show', $productId)->with('success', 'Terima kasih, ulasan kamu berhasil dikirim.');
    }
}
