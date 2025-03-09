<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function shop(Request $request ): Factory|View|Application
    {
        return view('frontend.pages.shops');
    }
}
