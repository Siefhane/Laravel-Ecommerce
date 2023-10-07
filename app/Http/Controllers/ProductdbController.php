<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProductdbController extends Controller
{
    function index(){
        $products = products::paginate(2);
        return view('products.index',['products'=>$products]);
    }

    function show($id){
        $product = products::findorfail($id);
        return view('products.show', ["product"=>$product]);
    }

    function  create(){
        $categories=Category::all();
        return view('products.create',['categories'=>$categories]);

    }
    function store()
    {

        $request_data= \request()->all();
        $request_data['creator_id']= Auth::id();
        $product=products::create($request_data);
        return to_route('products.show', $product->id);

    }
    function edit($id)
    {
        $product = products::findOrFail($id);
    
        return view('products.edit', ['product' => $product]);
    }
    function update($id)
{
    $product = products::find($id);

    $product->title = \request()->get('title');
    $product->description = \request()->get('description');
    $product->price = \request()->get('price');
    $product->rating = \request()->get('rating');
    $product->brand = \request()->get('brand');
    $product->category = \request()->get('category');
    $product->image = \request()->get('image');
    $product->category_id = \request()->get('category_id');


    $product->save();

    return redirect()->route('products.show', $product->id);
}
    function destroy( $id)
    {
        $product = products::findorfail($id);
        $product->delete();
        return to_route('products.index');
    }

}
