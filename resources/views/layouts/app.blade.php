<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8 maximum-scale=0.8, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">

    <link href="{{asset('css/iziToast.css')}}" rel="stylesheet"> <!-- libreria alert -->
    <script src="{{asset('js/lib/iziToast.js')}}" type="text/javascript"></script> <!-- libreria alert -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <!-- Scripts -->
    <link href="/css/app.css" rel="stylesheet">
    {{--@vite(['resources/sass/app.scss' , 'resources/js/app.js'])--}}
</head>
<body>
    
        @include('layouts.section.header')
    
    <main class="py-4">
            @yield('content')
    </main>
    </div>

    <div class="fade-sidebar disable-fade-sidebar" id="fade-sidebar" onclick="sidebar()"></div>
    @include('layouts.alert.messaggi')

    <script>
        feather.replace();
      </script>

      <script>
        function sidebar() {
            var sidebar = document.getElementById("sidebar");
            var fadeSidebar = document.getElementById("fade-sidebar");

            if(sidebar.classList.contains('open-sidebar') && fadeSidebar.classList.contains("active-fade-sidebar")) {
                sidebar.classList.remove("open-sidebar");
                fadeSidebar.classList.remove("active-fade-sidebar");
            } else {
                sidebar.classList.add("open-sidebar");
                fadeSidebar.classList.add("active-fade-sidebar");
            }
        }
      </script>
</body>
</html>
