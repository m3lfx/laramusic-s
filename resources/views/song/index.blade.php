@extends('layouts.base')
@section('body')
    {{-- {{dump($songs)}} --}}
    <a class="btn btn-primary" href="{{ route('songs.create') }}" role="button" aria-disabled="true">add song</a>
    <div class="container">
        {!! Form::open(['route' => 'listeners.store', 'class' => 'form-control', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::label('search', 'Search Here', ['class' => 'form-control']) }}
        {!! Form::text('search') !!}
        
        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
        
        {!! Form::close() !!}
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">song id</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">album name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
                <tr>
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->song_title }}</td>
                    <td>{{ $song->description }}</td>
                    <td>{{ $song->album_title }}</td>

                    <td><a href="{{ route('songs.edit', $song->id) }}"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('songs.destroy', $song->id) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button><i class="fas fa-trash" style="color:red"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $songs->links() }}
@endsection
