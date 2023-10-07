@extends('layouts.app')





@section('body')
<div class="row m-3">
@foreach($products as $product)
<div class="card m-2 p-2" style="width: 18rem; height:520px">
<img src="{{asset('images/').$product['images']}}" class="card-img-top" alt="..." style="height:50%">
  <div class="card-body">
    <h5 class="card-title">{{$product['title']}}</h5>
    <p class="card-text">{{$product['description']}}</p>
    <p class="card-text">{{$product['price']}} $</p>
    <a href="/products/{{$product['id']}}" class="btn btn-primary">Details</a>
  </div>
</div>
@endforeach
</div>
@endsection