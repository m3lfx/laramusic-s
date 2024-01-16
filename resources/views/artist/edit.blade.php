@extends('layouts.base')
@section('body')
    <form action="{{url('/artist/'.$artist->id.'/update')}}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="exampleInputEmail1">Artist Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Artist Name" name="name" value="{{$artist->name}}">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">country</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="artist country" name="country" value="{{$artist->country}}">
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="text" class="form-control" name="img_path" value="{{$artist->img_path}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
