
@extends('layouts.app')

@section('body')
<form method="post" action="{{route('category.store')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-floating mb-3">
    <input name="name" type="text" class="form-control" id="floatingInput">
    @error('name')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
    @enderror
    <label for="floatingInput">name</label>
    </div>
    <div class="form-floating mb-3">
    <input name="logo" type="file" class="form-control" id="floatingInput">
    @error('logo')
                <div style="color: red; font-weight: bold"> {{$message}}</div>
    @enderror
    <label for="floatingInput">Logo</label>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Confirm</button>
</form>
@endsection
