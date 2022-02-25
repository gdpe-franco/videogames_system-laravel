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
                <th scope="col">Price</th>
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
                    <td><a href=" {{ route('videogames.edit', $videogame) }}">Edit</a></td> 
                    <td>Delete</td>
                </tr>
            @empty
                    <li> There are no videogames to show </li> -->
            @endforelse
        </tbody>
    </table>
@endsection