@extends('layouts.app')
@section('body')
<div class="row m-3">
<div class="card m-2 p-2" style="width: 18rem; height:520px">
<img src="{{asset('images/track_logo/'.$category->logo)}}" class="card-img-top" alt="..." style="height:50%">
  <div class="card-body">
    <h5 class="card-title">{{$category->id}}</h5>
    <p class="card-text">{{$category->name}}</p>
  </div>
  <p>ALL Products</p>
  @foreach($category->products as $product)
            <li> <a href="{{route('products.show', $product->id)}}"> {{$product->title}}</a></li>

        @endforeach
</div>
<a href="{{route('category.index')}}" class="btn btn-success">Back To categories</a>
</div>

@endsection