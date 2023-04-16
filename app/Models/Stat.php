<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $guarded = [];



    public static function totalePartiteGiocatore($id) {


        $stats = Stat::all()->where('user_id', $id)->first();

        $totale = $stats->tre_lettere_partite_giocate + $stats->quattro_lettere_partite_giocate + $stats->cinque_lettere_partite_giocate + $stats->sei_lettere_partite_giocate;

        return $totale;
    }


    public static function totalePuntiGiocatore($id) {
        
        $stats = Stat::all()->where('user_id', $id)->first();

        $totalePuntiGiocatore = $stats->tre_lettere_punti + $stats->quattro_lettere_punti + $stats->cinque_lettere_punti + $stats->sei_lettere_punti;

        return $totalePuntiGiocatore;
    }
}
