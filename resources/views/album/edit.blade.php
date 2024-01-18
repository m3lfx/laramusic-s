@extends('layouts.base')
@section('body')
    {{-- {{dd($artists)}} --}}
    <div class="container-fluid">
        <form action="{{ route('album.update', $album->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Album Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Album Name" name="title" value="{{ $album->title }}">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">genre</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="genre" name="genre"
                    value="{{ $album->genre }}">
            </div>
            <div class="form-group">
                <label for="image">date released</label>
                <input type="date" class="form-control" name="date_released" value="{{ $album->date_released }}">
            </div>
            <select class="form-select" aria-label="Default select example" name="artist_id">
                <option value="{{ $artist->id }}" selected>{{ $artist->name }}</option>
                @foreach ($artists as $artist)
                    <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-secondary" href="{{ route('album.index') }}" role="button" aria-disabled="true">cancel</a>
        </form>
    </div>
@endsection
