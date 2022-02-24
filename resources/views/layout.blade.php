<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mancos Anónimos')</title>
    <style>
        .active a {
            color: red;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <nav>
        <ul>
            <li class="{{ setActive('home')}}"><a href="/">Home</a></li>
            <li class="{{ setActive('users')}}"><a href="/users">Users</a></li>
            <li  class="{{ setActive('videogames')}}"><a href="/videogames">VideoGames</a></li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>