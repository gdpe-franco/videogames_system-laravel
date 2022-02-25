@extends('layout')

@section('title', 'Videogame | Edit')

@section('content')
<h1>Edit videogame</h1>

@include('partials.validation-errors')

<form method= "POST" action="{{ route('videogames.update', $videogame)}}">
    @csrf @method('PATCH')
    
    @include('videogames._form')

    <button>Update</button>
</form>
@endsection