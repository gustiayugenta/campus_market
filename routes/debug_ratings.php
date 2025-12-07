<?php

use Illuminate\Support\Facades\Route;
use App\Models\Rating;

Route::get('/check-ratings', function () {
    return Rating::orderBy('created_at', 'desc')->take(5)->get();
});
