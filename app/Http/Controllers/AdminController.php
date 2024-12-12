<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Payment;
class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
   

    
}
