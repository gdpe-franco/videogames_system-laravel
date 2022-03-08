@extends('layout')

@section('title', 'Videogames')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-item-center mb-3">
        @if(isset($rating))
            <div>
                <h1 class="">{{ $rating->name}}</h1>
                <a href="{{ route('videogames.index' )}}">Go back to all videogames</a>
            </div>
        @elseif(isset($console))
            <div>
                <h1 class="">{{ $console->name}}</h1>
                <a href="{{ route('videogames.index' )}}">Go back to all videogames</a>
            </div>
        @else   
            <h1 class="">Videogames</h1>
        @endif

        @can('create-videogames')
            <a href=" {{ route('videogames.create') }}"><button class="btn btn-outline-success">Add</button></a>
        @endcan
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
                    <td>
                        <a href="{{ route('consoles.show', $videogame->console) }}">
                        {{ $videogame->console->name }}</a>
                    </td>

                    @auth
                        <td>
                            {{ $videogame->purchase_price }}
                        </td>
                    @endauth
                    <td>{{ $videogame->sale_price }}</td>
                    @auth
                        <td><a href=" {{ route('videogames.edit', $videogame) }}">
                            <button class="btn btn-outline-info">Edit</button>
                        </a></td> 
                        
                        <td>
                            <form method="POST"
                                action=" {{route('videogames.destroy', $videogame)}} "
                                class="delete-form">
                                @csrf @method('DELETE')   
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
        const element = document.querySelector('form');
        element.addEventListener('submit', event => {
            event.preventDefault();
            // actual logic, e.g. validate the form
            console.log('Form submission cancelled.');
     
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        });
    </script>

    <script>
        Swal.fire('Any fool can use a computer')
    </script>

@endsection
