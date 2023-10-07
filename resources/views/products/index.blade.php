
@extends('layouts.app')

@section('body')
<a href="{{route('products.create')}}" class="btn btn-success">Add New Product</a>
<div class="row m-3">
@foreach($products as $product)
<div class="card m-2 p-2" style="width: 18rem; height:520px">
<img src="{{asset('images/').'/'.$product->image}}" class="card-img-top" alt="..." style="height:50%">
  <div class="card-body">
    <h5 class="card-title">{{$product->title}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text">{{$product->price}} $</p>
    <a href="{{route('products.show',$product->id)}}" class="btn btn-primary">Details</a>
    <a href="{{route('products.delete',$product->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product!!')"> Delete</a>
    <a href="{{route('products.edit',$product->id)}}" class="btn btn-success">Edit</a>
  </div>
</div>
@endforeach
<div class="d-flex justify-content-center">
    {{ $products->links('pagination::bootstrap-4') }}
</div>
</div>
@endsection