@extends('layout')

@section('title', 'Videogames')

@section('content')
<div class="container">
    <h1 class="text-center mb-3">Videogames</h1>

    @auth
        <a href=" {{ route('videogames.create') }}"><button class="btn btn-outline-success mb-3">Add</button></a>
    @endauth

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Rating</th>
                <th scope="col">Console</th>
                @auth
                    <th scope="col">Purchace price</th>
                @endauth
                <th scope="col">Sale price</th>
                @auth
                    <th scope="col"></th>
                    <th scope="col"></th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse($videogames as $videogame)
                <tr>
                    <th>{{ $videogame->id }}</th>
                    <td>{{ $videogame->title }}</td>
                    <td>{{ $videogame->rating }}</td>
                    <td>{{ $videogame->console }}</td>
                    @auth
                        <td>{{ $videogame->purchase_price }}</td>
                    @endauth
                    <td>{{ $videogame->sale_price }}</td>
                    @auth
                        <td><a href=" {{ route('videogames.edit', $videogame) }}"><button class="btn btn-outline-info">Edit</button></a></td> 
                        <form method="POST" action="{{route('videogames.destroy', $videogame)}}">
                            @csrf @method('DELETE')    
                            <td><button class="btn btn-outline-danger">Delete</button></td>
                        </form>
                    @endauth
                </tr>
            @empty
                    <li> There are no videogames to show </li> -->
            @endforelse
        </tbody>
    </table>
</div>
@endsection