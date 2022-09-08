<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;
use File;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::where('user_id', auth()->user()->id)->latest()->get();
        
        return view('admin.products.products', compact('products')); 
    }

    public function show($product)
    {
        $product = Product::where('product_id', $product)->first();
        if($product){
            return view('admin.products.product', compact('product')); 
        }else{
            return abort('404');
        }
        
    }
    
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'title'   => ['required'],
            'category'   => ['required'],
            'price'   => ['required'],
            'qty'   => ['required'],
            'image'  => ['required' , 'max:2040'],
            'expiration' => ['nullable','date' , 'after:today'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        if($request->file('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $image = auth()->user()->id."_".$request->input('title').".".$extension;
            $file->move('public/assets/product_image/', $image);
        }

        Product::create([
            'user_id'     => auth()->user()->id,
            'product_id' => 'PROD'.substr(time(), 4).auth()->user()->id,
            'title'     => $request->input('title'),
            'category'     => $request->input('category'),
            'price'     => $request->input('price'),
            'qty'     => $request->input('qty'),
            'expiration'     => $request->input('expiration'),
            'image'     => $image,
            'description'     => $request->input('description'),
        ]);

        return response()->json(['success' => 'Successfully created!']);
    }


    public function edit(Product $product)
    {
        //
    }

    
    public function update(Request $request, Product $product)
    {
        //
    }

    
    public function destroy(Product $product)
    {
        //
    }
    public function product(Request $request, Product $product)
    {
        if($request->input('status') == 'APPROVED'){
            
        }
        $product->update([
            'status' => $request->input('status'),
        ]);
        return response()->json(['success' => 'Successfully updated!']);
    }


}
