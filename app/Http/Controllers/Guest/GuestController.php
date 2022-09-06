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
    public function search(){
        return view('guest.search.search');
    }
    public function search_product($product){
        $product = Product::where('product_id',$product)->first();
        if (request()->ajax()) {
            return response()->json(
                [
                   'product_id'  => $product->product_id ?? '',
                   'title'  => $product->title ?? '',
                   'image'  => 'public/assets/product_image/'.$product->image,
                   'price'  => $product->price ?? '',
                   'qty'  => $product->qty ?? '',
                   'category'  => $product->category ?? '',
                   'expiration'  => $product->expiration ?? '',
                   'description'  => $product->description ?? '',
                   'status'  => $product->status ?? '',
                   'created_at'  => $product->created_at->format('M d,Y h:i A') ?? '',
                   
                   'name'  => $product->user->personal_detail->name ?? '',
                   'email'  => $product->user->email ?? '',
                   'mobile_number'  => $product->user->personal_detail->mobile_number ?? '',
                   'address'  => $product->user->personal_detail->address . ',' .$product->user->personal_detail->city->city_municipality_description.' '.$product->user->personal_detail->province->province_description,

                   'bn'  => $product->user->business_detail->business_name ?? '',
                   'bpn'  => $product->user->business_detail->business_phone ?? '',
                   'ba'  => $product->user->business_detail->business_address . ',' .$product->user->business_detail->city->city_municipality_description.' '.$product->user->business_detail->province->province_description,
                ]
            );
        }
    }
    
}
