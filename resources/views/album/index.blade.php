@extends('layouts.base')
@section('body')
    {{-- {{dump($artists)}} --}}
    <table class="table table-striped">
        @foreach ($artists as $artist)
            <tr>
                <td>{{$artist->name}}</td>
                <td>{{$artist->country}}</td>
            </tr>
           
        @endforeach
    </table>
@endsection
