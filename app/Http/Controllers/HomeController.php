<?php

namespace App\Http\Controllers;

use App\Models\CoffeeShop;

class HomeController extends Controller
{
    public function index()
    {
        $shops = CoffeeShop::active()->inRandomOrder()->limit(6)->get();
        return view('welcome', compact('shops'));
    }
}
