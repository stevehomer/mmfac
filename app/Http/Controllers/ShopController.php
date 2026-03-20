<?php

namespace App\Http\Controllers;

use App\Models\CoffeeShop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = CoffeeShop::active();

        if ($search = $request->get('q')) {
            $query->search($search);
        }
        if ($request->boolean('wifi')) $query->where('has_wifi', true);
        if ($request->boolean('outdoor')) $query->where('has_outdoor', true);
        if ($request->boolean('dogs')) $query->where('dog_friendly', true);
        if ($request->boolean('food')) $query->where('hot_food', true);
        if ($request->boolean('accessible')) $query->where('accessible', true);

        $shops = $query->orderBy('name')->get();

        return view('shops.index', compact('shops'));
    }

    public function show(CoffeeShop $coffeeShop)
    {
        return view('shops.show', compact('coffeeShop'));
    }
}
