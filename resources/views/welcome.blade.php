<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8 maximum-scale=0.8, user-scalable=no" >

    <title>Gioco Parole</title>

    {{--@vite(['resources/sass/app.scss'])--}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,100;1,200;1,300;1,400&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('/images/trycat-logo.svg') }}">
    <link rel="stylesheet" href="/css/app.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="/js/app.js"></script>

    <link href="{{asset('css/iziToast.css')}}" rel="stylesheet"> <!-- libreria alert -->
    <script src="{{asset('js/lib/iziToast.js')}}" type="text/javascript"></script> <!-- libreria alert -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

</head>

<body>

    <main x-data="game" @keyup.window="onKeyPress($event.key)">

               <a href="#settings" class="nav parametri">Parametri</a>
        @include('modals.settings')

        <a href="#" x-model="theWordLength" class="ricomincia nav" @click="setTheWordLength(theWordLength)">Ricomincia</a>


        @auth
            <div class="user-log-block " style="position: absolute;
            top: 0px;
            left: 0px;
            margin: 20px;">
                <a href="{{route('profilo' , Auth::user()->id)}}" class="nav login user-log-name "> 
                    <img class="img-40 rounded user-log-img" src="{{Auth::user()->foto ? asset(Auth::user()->foto) : '/images/placeholder-user.jpg'}} ">
                </a>
            </div>
            <input type="hidden" value="{{Auth::user()->id}}" id="user_id">

            @else
            <div class="user-log-img p-3 position-absolute" style="right:0px; top:0px;">
                @include('layouts.section.header')
            </div>

        @endauth
        
        <h1>
            <img src="{{ asset('/images/trycat-logo.svg') }}" alt="">
        </h1>
        <output x-text="message"></output>
        <div id="game">
            <template x-for="(row, index) in board">
                
                <div class="row" :class="{'current' : currentRowIndex ==   index, 'invalid' : currentRowIndex == index && errors}">
                    <template x-for="tile in row">
                        <div class="tile" :class="tile.status" x-text="tile.letter"> </div>
                    </template>
                </div>
            </template>

            
        </div>
        <div id="keyboard" @click.stop="$event.target.matches('button') && onKeyPress($event.target.textContent)">
            <template x-for="row in letters">
                <div class="row">
                    <template x-for="key in row">
                        <button class="key" :class="matchingTileForKey(key)?.status" type="button" x-text="key"></button>
                    </template>
                </div>
            </template>
        </div>

    </main>

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
