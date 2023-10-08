<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ProductdbController extends Controller
{
    function __construct(){
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
        $this->middleware(['amazon'])->only(['store', 'update']);

    }

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
    function store(Request $request)
    {
        $request_data = $request->all();
        $request_data['creator_id'] = Auth::id();
    
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $path = $image->store("uploadedfile",'track_logo' );
            $request_data["image"] = $path;
        }
    
        $product = products::create($request_data);
        return redirect()->route('products.show', $product->id);
    }
    function edit($id)
    {
        $product = products::findOrFail($id);
        $categories=Category::all();
        return view('products.edit', ['product' => $product,'categories'=> $categories]);
    }
    function update(Request $request,$id)
{
    $product = products::find($id);
    $user= Auth::user();
    $response = Gate::inspect('update', $product);
    $admin = Gate::inspect('admin_update', $product);

    if($response->allowed()|$admin->allowed()) {
        $request_data = $request->all();
        $request_data['creator_id'] = Auth::id();
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $path = $image->store("uploadedfile",'track_logo' );
            $request_data["image"] = $path;
            $product->update($request_data);
            return redirect()->route('products.show', $product->id);
        }
    
        return redirect()->route('products.show', $product->id);
    }
    return  abort(403);

}
    function destroy( $id)
    {
        $user= Auth::user();
        $product = products::findorfail($id);
        $response = Gate::inspect('destroy', $product);
        $admin = Gate::inspect('admin_update', $product);

        if($response->allowed()|$admin->allowed()) {
            $product->delete();
            return to_route('products.index');
        }

        return  abort(403);
    }

}
