<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\ProductResource;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = products::paginate(2);
        return ProductResource::collection($product);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "title"=>"required",
        ]);

        if($validator->fails()){
            return response($validator->errors()->all(), 422);
        }
        $product = products::create($request->all());
        return new ProductResource ($product);


    }

    /**
     * Display the specified resource.
     */
    public function show(products $product)
    {
       return new ProductResource($product) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $product)
    {
        $product->update($request->all());
        return new ProductResource ($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $product)
    {
        $product->delete();
        return response("Deleted", 204);
    }
}
