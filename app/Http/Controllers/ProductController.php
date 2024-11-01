<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnlineShopStoreRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function Store(ProductStoreRequest  $ProductStoreRequest)
    {
        $product =  Product::create($ProductStoreRequest->all());
       if($ProductStoreRequest->hasFile('image'))
       {
            $imageUrl = Storage::putFile('/product', $ProductStoreRequest->image);
            $product->update(
                [
                    'url_image' => $imageUrl
                ]);
       }

        return response()->json([
            'message' => 'محصول مورد نظر با موفقیت اضافه شد.',
            'data' => new ProductResource($product)
        ], 200);
    }

    public  function  Show($id)
    {
        $products = Product::find($id);

        if($products == null)
        {
            return response()->json([
                "message"=>"لیست هیچ محصولات یافت  نشد "
            ],
                404);
        }
        else{
            return response()->json([
                'message'=>'لیست محصولات با موفقیت دریافت شد ',
                'data' => ProductResource::collection($products)
            ]);
        }

//       return  new ProductResource($Product);
    }

    public function ShowAll(Product $Product)
    {
        $products = Product::all();

        if($products == null)
        {
            return response()->json([
                "message"=>"لیست هیچ محصولات یافت  نشد "
            ],
                404);
        }
        else{
            return response()->json([
                'message'=>'لیست محصولات با موفقیت دریافت شد ',
                'data' => ProductResource::collection($products)
            ]);
        }
    }



}
