@extends('layout')

@section('title', 'Videogame | ' . $videogame->title)

@section('content')
{{ $videogame }}
@endsection