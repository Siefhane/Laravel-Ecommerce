@extends('layouts.app')

@section('body')
<form method="post" action="{{ route('category.update', $category->id) }}"enctype="multipart/form-data" >
    @csrf
    @method('PUT')

    <div class="form-floating mb-3">
    <input name="name" type="text" class="form-control" id="floatingInput"value="{{$category->name}}">
    @error('name')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
    @enderror
    <label for="floatingInput">name</label>
    </div>
    <div class="form-floating mb-3">
    <input name="logo" type="file" class="form-control" id="floatingInput"value="{{$category->logo}}">
    @if ($category->logo)
        <p>Current Logo: {{ $category->logo }}</p>
    @else
        <p>No Logo Uploaded</p>
    @endif
    @error('logo')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
    @enderror
    <label for="floatingInput">Logo</label>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Update</button>
</form>
@endsection