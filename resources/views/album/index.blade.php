@extends('layouts.base')
@section('body')
    {{-- {{dump($albums)}} --}}
    <a class="btn btn-primary" href="{{route('album.create')}}" role="button" aria-disabled="true" >add album</a>
    <table class="table table-striped">
        @foreach ($albums as $album)
            <tr>
                <td>{{$album->id}}</td>
                <td>{{$album->title}}</td>
                <td>{{$album->genre}}</td>
                <td>{{$album->date_released}}</td>
                <td><a href="{{route('album.edit', $album->id)}}"><i class="fas fa-edit"></i></a></td>
                <td><a href="{{url('/album/'. $album->id. 'delete')}}"><i class="fas fa-trash" style="color:red"></i></a></td>
            </tr>
           
        @endforeach
    </table>
@endsection
