@extends('layouts.base')
@section('body')
    <div class="container">
        <form action="{{ route('songs.update', $song->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="song_name" class="form-label">song Name</label>
                <input type="text" class="form-control" id="song_name" placeholder="song title" name="title"
                    value="{{ $song->title }}">
            
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <input type="text" class="form-control" id="description" placeholder="song description"
                    name="description" value="{{ $song->description }}">
                
            </div>
            <div class="mb-3">
                <label for="albums" class="form-label">Pick An Artist</label>
                <select class="form-select" aria-label="Default select example" name="album_id">
            </div>
            
            <option selected value="{{ $my_album->id }}">{{ $my_album->title }}</option>
            @foreach ($albums as $album)
                <option value="{{ $album->id }}">{{ $album->title }}</option>
            @endforeach
            </select>

            <button class="btn btn-primary" type="submit">update song</button>
        </form>
    </div>
@endsection
