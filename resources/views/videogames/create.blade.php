@extends('layout')

@section('title', 'Videogame | Create')

@section('content')
<h1>Add new game</h1>
<form method= "POST" action="{{ route('videogames.store') }}">
    @csrf
    <label >
        Title
        <input type="text" name = "title">
    </label> <br>
    <label >
        Rating
        <select name="rating" id="">
            <option value="">Select a rating...</option>
            <option value="">Everyone</option>
            <option value="">Everyone 10+</option>
            <option value="">Teen</option>
            <option value="">Mature 17+</option>
            <option value="">Adults Only 18+</option>
            <option value="">Rating Pending</option>
            <option value="">Rating Pending-Likely Mature 17+</option>
        </select>
    </label> <br>
    <label >
        Videogame console
        <select name="console" id="">
            <option value="">Select a console...</option>
            <option value="">Nintendo Switch</option>
            <option value="">PlayStation 5</option>
            <option value="">PlayStation 4</option>
            <option value="">Xbox Series X|S</option>
        </select>
    </label> <br>
    <label >
        Price
        <input type="number" name = "purchase_price" step="0.01">
    </label> <br>
    <label >
        URL
        <input type="text" name = "url">
    </label> <br>
    <button>Guardar</button>
</form>
@endsection