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
            header('content-type: image/jpeg');
            $sourceS = "public/assets/qr/test.png"; // SOURCE IMAGE

            $sourceW = "public/assets/qr/PRODUCT4411952.png"; // WATERMARK IMAGE
            $sourcedti = "public/assets/qr/dti.png"; // WATERMARK IMAGE

            $target = "public/assets/qr/test1.png"; // WATERMARKED IMAGE
         

            $image = imagecreatefrompng($sourceS);
            $imageSize = getimagesize($sourceS);
            
            $watermark = imagecreatefrompng($sourceW);
            $watermarkdti = imagecreatefrompng($sourcedti);
            
            $watermark_o_width = imagesx($watermark);
            $watermark_o_height = imagesy($watermark);

            $watermark_o_widthdti = imagesx($watermarkdti);
            $watermark_o_heightdti = imagesy($watermarkdti);
            
            $newWatermarkWidth = $imageSize[0]-760;
            $newWatermarkHeight = $watermark_o_height * $newWatermarkWidth / $watermark_o_width;

            $newWatermarkWidthdti = $imageSize[0]-760;
            $newWatermarkHeightdti = $watermark_o_heightdti * $newWatermarkWidthdti / $watermark_o_widthdti;
            
            imagecopyresized(
                $image, $watermark, $imageSize[0]/100 - $newWatermarkWidth/100, $imageSize[1]/6 - 
                $newWatermarkHeight/2, 0, 0, $newWatermarkWidth, $newWatermarkHeight,
                imagesx($watermark), imagesy($watermark));
            
            imagecopyresized(
                $image, $watermarkdti, $imageSize[0]/100 - $newWatermarkWidthdti/100, $imageSize[1]/2.5 - 
                $newWatermarkHeightdti/2, 0, 0, $newWatermarkWidthdti, $newWatermarkHeightdti,
                imagesx($watermarkdti), imagesy($watermarkdti));
            
            
            imagejpeg($image, $target);
            
            imagedestroy($image);
            imagedestroy($watermark);


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
            'product_id' => 'PRODUCT'.substr(time(), 4).auth()->user()->id,
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
    public function watermark()
    {
        $img = imagecreatefromjpeg("public/assets/product_image/test.jpg");
        $red = imagecolorallocatealpha($img, 255, 0, 0);
        imagettftext($img, 18, 0, 0, 24, $red, "PATH\FONT.TTF", "COPYRIGHT");
        imagejpeg($img, "WATERMARKED.JPG", 60);
    }


}
