@extends('layout')

@section('title', 'Videogame | Create')

@section('content')

<div class="container ">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <h1 class="text-center">Add new game</h1>
            
            @include('partials.validation-errors')

            <form class="bg-white shadow rounded py-3 px-4"
                method= "POST" 
                action="{{ route('videogames.store') }}">
                @csrf
    
                @include('videogames._form')
                
                <button type="button"
                 class="btn btn-primary btn-md btn-block fr">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection