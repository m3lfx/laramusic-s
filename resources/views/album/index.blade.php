@extends('layouts.base')
@section('body')
    {{-- {{dump($albums)}} --}}
    <table class="table table-striped">
        @foreach ($albums as $album)
            <tr>
                <td>{{$album->id}}</td>
                <td>{{$album->title}}</td>
                <td>{{$album->genre}}</td>
                <td>{{$album->date_released}}</td>
                <td><a href=""><i class="fas fa-edit"></i></a></td>
                <td><a href=""><i class="fas fa-trash" style="color:red"></i></a></td>
            </tr>
           
        @endforeach
    </table>
@endsection
