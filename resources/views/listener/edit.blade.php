@extends('layouts.base')
@section('body')
{{-- {{dd($listener)}} --}}
    <div class="container">
        {!! Form::model($listener, ['route' => ['listeners.update', $listener->id], 'class' => 'form-control',  'files' => true, 'method' => 'put']) !!}
        {{ Form::label('name', 'first Name', ['class' => 'form-control']) }}
        {!! Form::text('name') !!}
        {{ Form::label('address', 'Address', ['class' => 'form-control']) }}
        {!! Form::text('address') !!}
        {{ Form::label('img_path', 'upload image', ['class' => 'form-control']) }}
        {!! Form::file('img_path', ['class' => 'form-control']) !!}
        @error('img_path')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <img src="{{ url($listener->img_path) }}" alt="listener image" width="50" height="50">
        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
