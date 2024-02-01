@extends('layouts.base')
@section('body')
    {{-- {{dump($results)}} --}}
    <a class="btn btn-primary" href="{{ route('songs.create') }}" role="button" aria-disabled="true">add result</a>
    <div class="container">
        {!! Form::open(['route' => 'songs.search', 'class' => 'form-control']) !!}
        {{ Form::label('search', 'Search Here', ['class' => 'form-control']) }}
        {!! Form::text('search') !!}
        
        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
        
        {!! Form::close() !!}
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">result id</th>
                <th scope="col">title</th>
                <th scope="col">artist name</th>
                <th scope="col">description</th>
                <th scope="col">album name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->id }}</td>
                    <td>{{ $result->song_title }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->description }}</td>
                    <td>{{ $result->album_title }}</td>

                    <td><a href="{{ route('songs.edit', $result->id) }}"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('songs.destroy', $result->id) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button><i class="fas fa-trash" style="color:red"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $results->links() }} --}}
@endsection
