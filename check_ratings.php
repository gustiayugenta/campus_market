<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$ratings = \App\Models\Rating::orderBy('created_at', 'desc')->take(5)->get();

foreach ($ratings as $rating) {
    echo "ID: " . $rating->id . "\n";
    echo "Name: " . $rating->name . "\n";
    echo "Email: " . $rating->email . "\n";
    echo "Created At: " . $rating->created_at . "\n";
    echo "------------------------\n";
}
