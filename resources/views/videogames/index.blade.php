@extends('layout')

@section('title', 'Videogames')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-item-center mb-3">
        @if(isset($rating))
            <div>
                <h1 class="">{{ $rating->name}}</h1>
                <a href="{{ route('videogames.index')}}">Go back to all videogames</a>
            </div>
        @elseif(isset($console))
            <div>
                <h1 class="">{{ $console->name}}</h1>
                <a href="{{ route('videogames.index')}}">Go back to all videogames</a>
            </div>
        @else   
            <h1 class="">Videogames</h1>
        @endif

        @can('create', App\Models\Videogame::class)
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
                        @can('update', $videogame)
                        <td>
                            <a href=" {{ route('videogames.edit', $videogame) }}">
                                <button class="btn btn-outline-info">Edit</button>
                            </a>
                        </td> 
                        @endcan

                        @can('delete', $videogame)
                        <td>
                            <form
                                method="POST"
                                action=" {{route('videogames.destroy', $videogame)}} ">
                                @csrf @method('DELETE')
                                
                                <button type="submit"
                                    class="btn btn-outline-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                        @endcan
                    @endauth
                </tr>
            @empty
                There are no videogames to show
            @endforelse
        </tbody>
    </table>
</div>
<br><br>
@can('view-deleted-videogames')
    <div class="container">
        <h4>Trash</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Restore</th> 
                    <th scope="col">Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($deletedVideogames as $deletedVideogame)
                    <tr>
                        <td>
                            {{ $deletedVideogame->title }}
                        </td>
                        @can('restore', $deletedVideogame)
                            <td>
                                <form method="POST"
                                    action="{{ route('videogames.restore', $deletedVideogame) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class ="btn btn-outline-warning">Restore</button>
                                </form>
                            </td>
                        @endcan
                        @can('force-delete', $deletedVideogame)
                            <td>
                                <form method="POST" class="form-force-delete"
                                    onsubmit = "formForceDelete(event)"
                                    action="{{ route('videogames.force-delete', $deletedVideogame) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class ="btn btn-danger">Delete permanently</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                    @empty
                    No videogames in trash
                @endforelse
            </tbody>    
        </table>
    </div>
@endcan
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    <script>
        function formForceDelete (e) {
            let element = document.querySelector(".form-force-delete");
            e.preventDefault();
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
                    element.submit();
                    /* Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    ) */
                }
            })
        }
    </script>

@endsection
