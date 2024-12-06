<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductUpdateResource;
use App\Models\Category;
use App\Models\Product;
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
        $product = Product::find($id);

        if($product == null)
        {
            return response()->json([
                "message"=>"لیست هیچ محصولات یافت  نشد "
            ],
                404);
        }
        else{
            return response()->json([
                'message'=>'لیست محصولات با موفقیت دریافت شد ',
                'data' => new ProductResource($product)
            ]);
        }

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


    public function update( productUpdateRequest $productUpdateRequest, Product $product)
    {

        $product->update($productUpdateRequest->all());
        return response()->json([
            "message" => 'محصول مورد نظر با موفقیت بروزرسانی شد.',
            "data" => new ProductUpdateResource($product)
        ], 200);
    }



    public function destroy( Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => "محصول مورد نظر با موفقیت حذف شد.",
        ]);
    }

}
