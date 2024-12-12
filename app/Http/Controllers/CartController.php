<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('carts.index', compact('carts'));
    }
}
