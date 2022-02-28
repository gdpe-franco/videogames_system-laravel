@extends('layout')

@section('title', 'Videogame | Create')

@section('content')

    <h1>Add new game</h1>

    @include('partials.validation-errors')

    <form method= "POST" action="{{ route('videogames.store') }}">
        @csrf
    
        @include('videogames._form')

        <button>Save</button>
    </form>

@endsection