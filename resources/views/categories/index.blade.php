
@extends('layouts.app')

@section('body')
<a href="{{route('category.create')}}" class="btn btn-success">Add New category</a>
<div class="row m-3">
@foreach($categories as $category)
<div class="card m-2 p-2" style="width: 18rem; height:520px">
<img src="{{asset('images/track_logo/'.$category->logo)}}" class="card-img-top" alt="..." style="height:50%">
  <div class="card-body">
    <h5 class="card-title">{{$category->name}}</h5>
    <!-- <a href="{{route('category.destroy',$category->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category!!')"> Delete</a> -->
    <a href="{{route('category.show',$category->id)}}" class="btn btn-primary">Details</a>
    <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
    <form action="{{route('category.destroy',$category->id)}}" method="post">
      @csrf
      @method('delete')
          <button type="submit" class="btn btn-danger" > Delete</button>
    </form>
  </div>
</div>
@endforeach
<div class="d-flex justify-content-center">
    {{ $categories->links('pagination::bootstrap-4') }}
</div>
</div>
@endsection