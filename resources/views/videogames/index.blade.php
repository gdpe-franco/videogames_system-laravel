@extends('layout')

@section('title', 'Videogames')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-item-center mb-3">
        @isset($rating)
            <div>
                <h1 class="">{{ $rating->name}}</h1>
                <a href="{{ route('videogames.index' )}}">Go back to all videogames</a>
            </div>
        @else   
            <h1 class="">Videogames</h1>
        @endisset

        @auth
            <a href=" {{ route('videogames.create') }}"><button class="btn btn-outline-success">Add</button></a>
        @endauth
    </div>
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
                    <td>
                        <a href="{{ route('ratings.show', $videogame->rating) }}"
                        >{{ $videogame->rating->name}}</a>
                    </td>
                    <td>{{ $videogame->console }}</td>
                    @auth
                        <td>{{ $videogame->purchase_price }}</td>
                    @endauth
                    <td>{{ $videogame->sale_price }}</td>
                    @auth
                        <td><a href=" {{ route('videogames.edit', $videogame) }}">
                            <button class="btn btn-outline-info">Edit</button>
                        </a></td> 
                        
                        <td>
                            <form method="POST" action=" {{route('videogames.destroy', $videogame)}} ">
                                @csrf @method('DELETE')   
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @empty
                <li> There are no videogames to show </li>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
