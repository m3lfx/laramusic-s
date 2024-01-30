@extends('layouts.base')
@section('body')
    {{-- {{dump($listeners)}} --}}
    <a class="btn btn-primary" href="{{ route('listeners.create') }}" role="button" aria-disabled="true">add listener</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">image</th>
                <th scope="col">name</th>
                <th scope="col">address</th>
                
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listeners as $listener)
                <tr>
                    <td>{{ $listener->id }}</td>
                    <td><img src="{{ url($listener->img_path) }}" alt="listener image" width="50" height="50"></td>
                    <td>{{ $listener->name }}</td>
                    <td>{{ $listener->address }}</td>
                   

                    <td><a href="{{ route('listeners.edit', $listener->id) }}"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('listeners.destroy', $listener->id) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button><i class="fas fa-trash" style="color:red"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $listeners->links() }} --}}
@endsection
