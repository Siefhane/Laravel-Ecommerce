
@extends('layouts.app')

@section('body')
@if(\Illuminate\Support\Facades\Auth::id())
<a href="{{route('category.create')}}" class="btn btn-success">Add New category</a>
@endif
<div class="row m-3">
@foreach($categories as $category)
<div class="card m-2 p-2" style="width: 18rem; height:520px">
<img src="{{asset('images/track_logo/'.$category->logo)}}" class="card-img-top" alt="..." style="height:50%">
  <div class="card-body">
  <h5 class="card-title">{{$category->name}}</h5>
  <p class="card-title " ><span class="text-danger fw-bold">This Category Was Deleted At :</span> {{$category->deleted_at}}</p>
    <!-- <a href="{{route('category.destroy',$category->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category!!')"> Delete</a> -->
    @if(\Illuminate\Support\Facades\Auth::id())
    <a href="{{route('categories.restore',$category->id)}}" class="btn btn-primary">Restore</a>
    <form action="{{route('categories.destroy',$category->id)}}" method="post">
      @csrf
      @method('delete')
          <button type="submit" class="btn btn-danger" > Delete</button>
    </form>
    @endif
  </div>
</div>
@endforeach
<div class="d-flex justify-content-center">
    {{ $categories->links('pagination::bootstrap-4') }}
</div>
</div>
@endsection