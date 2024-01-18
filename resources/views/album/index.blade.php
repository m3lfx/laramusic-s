@extends('layouts.base')
@section('body')
    {{-- {{dump($albums)}} --}}
    <a class="btn btn-primary" href="{{ route('album.create') }}" role="button" aria-disabled="true">add album</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">album id</th>
                <th scope="col">title</th>
                <th scope="col">Artist</th>
                <th scope="col">genre</th>
                <th scope="col">date released</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{ $album->id }}</td>
                    <td>{{ $album->title }}</td>
                    <td>{{ $album->name }}</td>
                    <td>{{ $album->genre }}</td>
                    <td>{{ $album->date_released }}</td>
                    <td><a href="{{ route('album.edit', $album->id) }}"><i class="fas fa-edit"></i></a><a
                            href="{{ route('album.delete', $album->id) }}"><i class="fas fa-trash"
                                style="color:red"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
