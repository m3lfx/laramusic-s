@extends('layouts.base')
@section('body')
    <div class="container">
        {!! Form::open(['route' => 'listeners.store', 'class' => 'form-control', 'enctype' => 'multipart/form-data']) !!}
        @foreach ($albums as $album)
            <br>
            {{ Form::checkbox('album[]', $album->id, false, null, ['class' => 'form-control']) }}
            {{ Form::label('album[]', $album->title) }}
        @endforeach

        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection
