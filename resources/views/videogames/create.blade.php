@extends('layout')

@section('title', 'Videogame | Create')

@section('content')
<h1>Add new game</h1>
@if($errors-> any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form method= "POST" action="{{ route('videogames.store') }}">
    @csrf
    <label >
        Title
        <input type="text" name = "title">
    </label> <br>
    <label >
        Rating
        <select name="rating" id="">
            <option selected="true" disabled="disabled" value="">Select a rating...</option>
            <option>Everyone</option>
            <option>Everyone 10+</option>
            <option>Teen</option>
            <option>Mature 17+</option>
            <option>Adults Only 18+</option>
            <option>Rating Pending</option>
            <option>Rating Pending-Likely Mature 17+</option>
        </select>
    </label> <br>
    <label >
        Videogame console
        <select name="console" id="">
            <option selected="true" disabled="disabled" value="">Select a console...</option>
            <option>Nintendo Switch</option>
            <option>PlayStation 5</option>
            <option>PlayStation 4</option>
            <option>Xbox Series X|S</option>
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