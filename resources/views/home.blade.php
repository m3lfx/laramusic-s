@extends('layouts.app')

@section('head')
    @parent
    <link rel="stylesheet" href="another.css" />
@stop

@section('content')
    <h1>Hurray!</h1>
    <p>We have a template!</p>
@stop

@section('content')
    <h2>net section</h2>
@endsection
