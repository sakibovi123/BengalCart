<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// auth routes
require_once base_path(
    'app/Http/Controllers/Auth/Routes/routes.php'
);

// category path
require_once base_path(
    'app/Http/Controllers/Category/Routes/routes.php'
);

// sub category path
require_once base_path(
    'app/Http/Controllers/SubCategory/Routes/routes.php'
);

require_once base_path(
    'app/Http/Controllers/Campaign/Routes/routes.php'
);

// colors
require_once base_path(
    'app/Http/Controllers/Color/Routes/routes.php'
);

// products
require_once base_path(
    'app/Http/Controllers/Product/Routes/routes.php'
);

// cart routes
require_once base_path(
    'app/Http/Controllers/Cart/Routes/routes.php'
);
