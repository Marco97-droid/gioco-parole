<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{

    public function profilo($id) {

        $user = User::find($id);

        return view('profilo' , compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        request()->validate(User::rules_update($id));

        if (request('password') && request('conferma_password')) {

            request()->validate(User::rules_update_password($id));
            $user->password = Hash::make(request('password'));
            $user->update();
        }
        
        if (request()->hasFile('foto')) {
            if (File::exists($user->foto)) { // controllo se la foto esiste
                if ($user->foto != "/images/placeholder-user.jpg") { // se la foto è diversa rispetto a quella di default
                    File::delete($user->foto);
                }
            }

            $file = request()->file('foto');
            $fileName = 'foto_profilo_' . substr(md5(microtime()), rand(0, 26), 8) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/images/profilo'), $fileName);
            $user->foto = '/images/profilo/' . $fileName;
            $user->update();
        }

        if ($user->update(request()->except('foto', 'password'))) {

            return back()->with('success', 'Profilo aggiornato con successo');
        }
    }



    public function updateStatsThreeLetter(Request $request ) {
        $user = User::find($request->userId);

        if($user) {
            $userStats =  $user->stats->first();
            
            $userStats->tre_lettere_partite_giocate =  $userStats->tre_lettere_partite_giocate + 1;

            if($request->completed) {
                $userStats->tre_lettere_indovinate =  $userStats->tre_lettere_indovinate + 1;

                $userStats->tre_lettere_punti = $userStats->tre_lettere_punti + $request->punti;
            }  else {
                $userStats->tre_lettere_sbagliate =  $userStats->tre_lettere_sbagliate + 1;
            } 
            
            $userStats->update();

            return response()->json($request->all());
        }

    }

    public function updateStatsFourLetter(Request $request ) {
        $user = User::find($request->userId);

        if($user) {
            $userStats =  $user->stats->first();
            
            $userStats->quattro_lettere_partite_giocate =  $userStats->quattro_lettere_partite_giocate + 1;

            if($request->completed) {
                $userStats->quattro_lettere_indovinate =  $userStats->quattro_lettere_indovinate + 1;

                $userStats->quattro_lettere_punti = $userStats->quattro_lettere_punti + $request->punti;
            }  else {
                $userStats->quattro_lettere_sbagliate =  $userStats->quattro_lettere_sbagliate + 1;
            } 
            
            $userStats->update();

            return response()->json($request->all());
        }

    }

    public function updateStatsFiveLetter(Request $request ) {
        $user = User::find($request->userId);

        if($user) {
            $userStats =  $user->stats->first();
            
            $userStats->cinque_lettere_partite_giocate =  $userStats->cinque_lettere_partite_giocate + 1;

            if($request->completed) {
                $userStats->cinque_lettere_indovinate =  $userStats->cinque_lettere_indovinate + 1;

                $userStats->cinque_lettere_punti = $userStats->cinque_lettere_punti + $request->punti;
            }  else {
                $userStats->cinque_lettere_sbagliate =  $userStats->cinque_lettere_sbagliate + 1;
            } 
            
            $userStats->update();

            return response()->json($request->all());
        }

    }

    public function updateStatsSixLetter(Request $request ) {
        $user = User::find($request->userId);

        if($user) {
            $userStats =  $user->stats->first();
            
            $userStats->sei_lettere_partite_giocate =  $userStats->sei_lettere_partite_giocate + 1;

            if($request->completed) {
                $userStats->sei_lettere_indovinate =  $userStats->sei_lettere_indovinate + 1;

                $userStats->sei_lettere_punti = $userStats->sei_lettere_punti + $request->punti;
            }  else {
                $userStats->sei_lettere_sbagliate =  $userStats->sei_lettere_sbagliate + 1;
            } 
            
            $userStats->update();

            return response()->json($request->all());
        }

    }

    
}
