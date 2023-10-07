@extends('layouts.app')
@section('body')
<div class="row m-3">
<div class="card m-2 p-2" style="width: 18rem; height:520px">
<img src="{{asset('images/').$product['images']}}" class="card-img-top" alt="..." style="height:50%">
  <div class="card-body">
    <h5 class="card-title">{{$product['title']}}</h5>
    <p class="card-text">{{$product['description']}}</p>
    <p class="card-text">{{$product['price']}} $</p>
    <p class="card-text"  style="color:green"> rating :{{$product['rating']}}</p>
    <p class="card-text" style="color:blue"> Brand :{{$product['brand']}}</p>
    <p class="card-text"style="color:red">Category :{{$product['category']}}</p>
  </div>
</div>
<!-- <a href="/home" class=" btn btn-success">Back <== </a> -->
</div>
@endsection