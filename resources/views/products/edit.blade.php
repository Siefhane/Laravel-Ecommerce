@extends('layouts.app')

@section('body')
<form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input name="title" type="text" class="form-control" id="floatingInput" value="{{ $product->title }}">
        <label for="floatingInput">Title</label>
    </div>
    <div class="form-floating">
        <input name="description" type="text" class="form-control" id="floatingPassword" value="{{ $product->description }}">
        <label for="floatingPassword">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input name="price" type="number" class="form-control" id="floatingInput" value="{{ $product->price }}">
        <label for="floatingInput">Price</label>
    </div>
    <div class="form-floating">
        <input name="rating" type="number" class="form-control" id="floatingPassword" value="{{ $product->rating }}">
        <label for="floatingPassword">Rating</label>
    </div>
    <div class="form-floating mb-3">
        <input name="brand" type="text" class="form-control" id="floatingInput" value="{{ $product->brand }}">
        <label for="floatingInput">Brand</label>
    </div>
    <div class="form-floating mb-3">
        <input name="category" type="text" class="form-control" id="floatingInput" value="{{ $product->category }}">
        <label for="floatingInput">Category</label>
    </div>
    <div class="form-floating mb-3">
        <input name="image" type="file" class="form-control" id="floatingInput" value="{{ $product->image }}">
        <label for="floatingInput">Image</label>
    </div>
    <select class="form-select" name="category_id"aria-label="Default select example">
  <option selected>Open this select menu</option>
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>
  <br>
    <button type="submit" class="btn btn-primary mb-3">Update</button>
</form>
@endsection