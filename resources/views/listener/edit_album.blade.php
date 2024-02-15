@extends('layouts.app')
@section('content')
    <div class="container">

        {!! Form::open(['route' => 'listeners.updateAlbums', 'class' => 'form-control']) !!}
        @foreach ($albums as $album)
     
            @if (in_array($album->id, $myAlbums))
                <li>
                    {{ Form::checkbox('album_id[]', $album->id, true, null, ['class' => 'form-control', 'id' => 'album_id']) }}
                    {{ Form::label('album_id', $album->title, ['class' => 'control-label']) }}
                </li>
            @else
                <li>
                    {{ Form::checkbox('album_id[]', $album->id, false, null, ['class' => 'form-control', 'id' => 'album_id']) }}
                    {{ Form::label('album_id', $album->title, ['class' => 'control-label']) }}
                </li>
            @endif
        @endforeach

        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection
