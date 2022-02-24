@extends('layout')

@section('title', 'Videogames')

@section('content')
    <h1>Videogames</h1>
    <ul>
        @forelse($videogames as $videogame)
            <li>{{ $videogame['title'] }}</li>
        @empty
            <li> There are no videogames to show </li>
        @endforelse
    </ul>
@endsection