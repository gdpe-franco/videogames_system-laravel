@extends('layout')

@section('title', 'Videogame | See')

@section('content')

<div class="container d-flex justify-content-center mt-2">
    <div class="card" style="width: 18rem;">
    <img class="card-img-top mb-2" 
        src="/storage/{{ $videogame->image }}" 
        alt="{{ $videogame->title }}">
        <div class="card-body">
            <h5 class="card-title" value=>{{ $videogame->title }}</h5>
            <p>Rating: {{ $videogame->rating->name }}</p>
            <p>Console: {{ $videogame->console->name }}</p>
            <p>Sale price: ${{ $videogame->sale_price }}</p>
        </div>
    </div>
</div>

@endsection