@extends('layout')

@section('title', 'Videogame | Edit')

@section('content')

<div class="container ">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <h1 class="text-center my-3">Edit videogame</h1>

            @include('partials.validation-errors')

            <form class="bg-white shadow rounded py-3 px-4"
                method= "POST"
                enctype="multipart/form-data"
                action="{{ route('videogames.update', $videogame)}}">
                @csrf @method('PATCH')
            
                @include('videogames._form')
                <div class="d-grid gap-2">
                    <button type="submit"
                        class="btn btn-primary btn-md btn-block">Update
                    </button>
                    <button type="button" onclick="location.href='{{ route('videogames.index') }}'"
                        class="btn btn-outline-primary btn-md btn-block">Cancel
                    </button>
                </div> 
            </form>
        </div>
    </div>
</div>

@endsection