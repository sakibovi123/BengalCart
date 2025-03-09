<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShopController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ HomeController::class, 'home' ])->name('home');
Route::get('/shop', [ ShopController::class, 'shop' ])->name('shop');

require_once base_path(
  'app/Http/Controllers/Dashboard/Routes/routes.php'
);

// sliders routes
require_once base_path(
    'app/Http/Controllers/Slider/Routes/routes.php');

// categories path
require_once base_path(
    'app/Http/Controllers/Category/Routes/routes.php'
);

// campaigns path
require_once base_path(
    'app/Http/Controllers/campaigns/Routes/routes.php'
);
