<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mancos Anónimos')</title>
    
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between ">
        <header>
            @include('partials.nav')
            @include('partials.session-status')
        </header>
        <main>
            @yield('content')
        </main>
        <footer class="bf-white text-center text-black50 py-3">
             {{ config('app.name')}} | Copyright @ {{ date('Y')}}
        </footer>
    </div>
    @yield('js')
</body>
</html>