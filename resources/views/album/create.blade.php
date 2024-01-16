@extends('layouts.base')
@section('body')
    {{-- {{dd($artists)}} --}}
    <div class="container-fluid">
        <form action="{{ route('album.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Album Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Album Name" name="title">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">genre</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="artist country"
                    name="genre">
            </div>
            <div class="form-group">
                <label for="image">date released</label>
                <input type="date" class="form-control" name="date_released">
            </div>
            <select class="form-select" aria-label="Default select example" name="artist_id">
                <option selected>Open this select menu</option>
                @foreach ($artists as $artist)
                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                @endforeach


            </select>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
