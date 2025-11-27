<?php

use Illuminate\Support\Facades\Route;


// Route ke halaman Home Pengunjung
Route::get('/', function () {
    // Artinya: Buka file "home" yang ada di dalam folder "pengunjung"
    return view('pengunjung.home');
});

Route::get('/login-seller', function () {
    // Artinya: Buka file "home" yang ada di dalam folder "pengunjung"
    return view('pengunjung.login');
});

Route::get('/register-seller', function () {
    // Artinya: Buka file "register" yang ada di dalam folder "pengunjung"
    return view('pengunjung.register');
});