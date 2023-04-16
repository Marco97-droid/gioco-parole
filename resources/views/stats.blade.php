@extends('layouts.app')

@section('content')
    <div class="container-fluid container-login">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h1 class="text-center pb-5">
                    <div style=" background-image:url('{{ $user->foto ? $user->foto : '/images/user-placeholder.jpg' }}');"
                        class="img-100 mx-auto" alt=""></div>
                </h1>
                <div class="card card-login">
                    <div class="card-body ">
                        <h1 class="text-center mb-3">

                            Statistiche giocatore
                        </h1>

                        <ul class="list-stats">
                            <li>Totale punti: {{$stats->totPuntiGiocatore}}</li>
                            <li>Totale partite: {{$stats->totPartiteGiocatore}}</li>
                        </ul>

                        <h3 class="text-left mb-3">
                            3 lettere
                        </h3>
                        <ul class="list-stats">
                            <li>Totale punti: {{$stats->tre_lettere_punti}}</li>
                            <li>Totale partite: {{$stats->tre_lettere_partite_giocate}}</li>
                            <li>Vinte: {{$stats->tre_lettere_indovinate}}</li>
                            <li>Perse: {{$stats->tre_lettere_sbagliate}}</li>
                        </ul>

                        <h3 class="text-left mb-3">
                            4 lettere
                        </h3>
                        <ul class="list-stats">
                            <li>Totale punti: {{$stats->quattro_lettere_punti}}</li>
                            <li>Totale partite: {{$stats->quattro_lettere_partite_giocate}}</li>
                            <li>Vinte: {{$stats->quattro_lettere_indovinate}}</li>
                            <li>Perse: {{$stats->quattro_lettere_sbagliate}}</li>
                        </ul>

                        <h3 class="text-left mb-3">
                            5 lettere
                        </h3>
                        <ul class="list-stats">
                            <li>Totale punti: {{$stats->cinque_lettere_punti}}</li>
                            <li>Totale partite: {{$stats->cinque_lettere_partite_giocate}}</li>
                            <li>Vinte: {{$stats->cinque_lettere_indovinate}}</li>
                            <li>Perse: {{$stats->cinque_lettere_sbagliate}}</li>
                        </ul>

                        <h3 class="text-left mb-3">
                            6 lettere
                        </h3>
                        <ul class="list-stats">
                            <li>Totale punti: {{$stats->sei_lettere_punti}}</li>
                            <li>Totale partite: {{$stats->sei_lettere_partite_giocate}}</li>
                            <li>Vinte: {{$stats->sei_lettere_indovinate}}</li>
                            <li>Perse: {{$stats->sei_lettere_sbagliate}}</li>
                        </ul>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
