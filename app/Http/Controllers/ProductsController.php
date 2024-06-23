<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\Type;
use App\Service\Product\ProductService;
use Illuminate\Http\Request;

class ProductsController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Product::with('type')->get();
        $products = Product::all();
        return ProductResource::collection($products);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

            if(preg_match('~[а-яё]+~iu', $data['serial_number'])){
                return response()->json([
                    'massage' => 'используется кириллица'
                ]);
            }
            else
            {
                $pattern = "/[A-z]/";
                $pattern2 = "/[0-9]/";
                $pattern3 = array("-", "_", "@");

                $pre = preg_replace($pattern, "X", $data['serial_number']); // буквы
                $pre2 = preg_replace($pattern2, "N", $pre); // цифры
                $data['serial_number'] =  str_replace($pattern3, 'Z', $pre2); // символы

                $types = Type::all();

                foreach ($types as $type) {
                    if ($type['maskSN'] === $data['serial_number']){

                        $data = $request->validated();
                        $product = Product::firstOrCreate($data);
                        return ProductResource::make($product);

                    }
                }
            }


    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'massage' => 'Удалено'
        ]);
    }
}
