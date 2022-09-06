<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class GuestController extends Controller
{
    public function marketplace(){
        $products = Product::where('status', 'APPROVED')->latest()->get();
        return view('guest.marketplace', compact('products')); 
    }
    public function unionbank(){
        return view('guest.unionbank.unionbank'); 
    }
    public function unionbank_payment(){
        return view('guest.unionbank.unionbank_payment'); 
    }
    public function unionbank_confirm(){
        return view('guest.unionbank.unionbank_confirm'); 
    }
}
