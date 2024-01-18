@extends('layouts.base')
@section('body')
    {{-- {{dump($songs)}} --}}
    <a class="btn btn-primary" href="{{ route('songs.create') }}" role="button" aria-disabled="true">add song</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">song id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
                <tr>
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->description }}</td>

                    <td><a href="{{ route('songs.edit', $song->id) }}"><i class="fas fa-edit"></i></a><a
                            href="{{ route('songs.destroy', $song->id) }}"><i class="fas fa-trash" style="color:red"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
