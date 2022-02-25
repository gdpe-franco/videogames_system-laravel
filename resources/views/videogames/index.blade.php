@extends('layout')

@section('title', 'Videogames')

@section('content')
    <div class="container d-flex justify-content-center">
        <h1>Videogames</h1>
    </div>
    <button><a href=" {{ route('videogames.create') }}">Add++</a></button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Rating</th>
                <th scope="col">Console</th>
                <th scope="col">Purchace price</th>
                <th scope="col">Sale price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($videogames as $videogame)
                <tr>
                    <th>{{ $videogame->id }}</th>
                    <td>{{ $videogame->title }}</td>
                    <td>{{ $videogame->rating }}</td>
                    <td>{{ $videogame->console }}</td>
                    <td>{{ $videogame->purchase_price }}</td>
                    <td>{{ (double)$videogame->purchase_price * 1.4}}</td>
                    <td><a href=" {{ route('videogames.edit', $videogame) }}">Edit</a></td> 
                    <form method="POST" action="{{route('videogames.destroy', $videogame)}}">
                        @csrf @method('DELETE')    
                        <td><button>Delete</button></td>
                    </form>
                </tr>
            @empty
                    <li> There are no videogames to show </li> -->
            @endforelse
        </tbody>
    </table>
@endsection