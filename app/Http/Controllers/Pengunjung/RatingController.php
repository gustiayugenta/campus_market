<?php

namespace App\Http\Controllers\Pengunjung;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\RatingThankYou;

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

        // Find region_id based on provinsi name
        $regionId = null;
        if (!empty($data['provinsi'])) {
            $region = \App\Models\Region::where('name', 'like', '%' . $data['provinsi'] . '%')->first();
            $regionId = $region ? $region->id : 1; // Default to 1 (Jawa Timur) if not found, or handle error
        } else {
            $regionId = 1; // Default fallback
        }

        // Persist rating
        $rating = Rating::create([
            'product_detail_id' => $data['product_detail_id'],
            'name'   => $data['name'],
            'email'  => $data['email'],
            'no_telp'=> $data['no_telp'] ?? '-', // Fallback for required column
            'region_id' => $regionId,
            'rating' => $data['rating'],
            'review' => $data['review'] ?? null,
        ]);

        // Send Thank You Email
        try {
            Mail::to($data['email'])->send(new RatingThankYou($rating));
        } catch (\Exception $e) {
            // Log error but don't stop the process
            \Illuminate\Support\Facades\Log::error('Failed to send rating thank you email: ' . $e->getMessage());
        }

        // Redirect back to product detail
        $detail = ProductDetail::find($data['product_detail_id']);
        $productId = $detail ? $detail->product_id : null;
        return Redirect::route('products.show', $productId)->with('success', 'Terima kasih, ulasan kamu berhasil dikirim.');
    }
}
