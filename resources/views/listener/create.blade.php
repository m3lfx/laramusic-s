@extends('layouts.base')
@section('body')
    <div class="container">
        {!! Form::open(['route' => 'listeners.store', 'class' => 'form-control', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::label('last_name', 'Last Name', ['class' => 'form-control']) }}
        {!! Form::text('last_name') !!}
        {{ Form::label('first_name', 'first Name', ['class' => 'form-control']) }}
        {!! Form::text('first_name') !!}
        {{ Form::label('address', 'Address', ['class' => 'form-control']) }}
        {!! Form::text('address') !!}
        {{ Form::label('img_path', 'upload image', ['class' => 'form-control']) }}
        {!! Form::file('img_path', ['class' => 'form-control']) !!}
        @error('img_path')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
        
        {!! Form::close() !!}
    </div>
@endsection
