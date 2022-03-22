<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // pour interagir avec la base de données.
use App\Models\_user;

use Illuminate\Http\Request;

class userController extends Controller
{
    // afficher les utilisateurs disponibles:
    public function index()
    {
        // $usersRows = DB::table('_users')->get(); // pour obtenir tous les lignes de la table _users.
        // return view('users', ['users' => $usersRows]); // pour appeler la page resources/views/users.blade.php et passer le paramétre necessite.
        //------------------
        $usersRows = _user::all();
        return view('users', ['users' => $usersRows]);
    }
    // pour l'authentification d'un utilisateur:
    public function login(Request $loggedUser)
    {
        try 
        {
            $user = _user::where('email', $loggedUser->email)
                            ->where('password', $loggedUser->password)
                            ->get(); // select * from _users where email = '' and password = ''
            if (count($user) > 0)
            {
                $loggedUser->session()->put('email', $user[0]['email']);   
                $loggedUser->session()->put('password', $user[0]['password']);  
                $loggedUser->session()->flash('nom', $user[0]['nom'] . " " . $user[0]['prenom']);  
                return redirect('/users');
            }
            else
            {
                return 'nothing';
            }
        } 
        catch (\Throwable $th) 
        {
            echo $th;
        }
    }
    // ajouter nouveau utilisateur:
    public function adduser(Request $postedUser)
    {
        $userData = $postedUser->input();
        try
	    {
            $user = new _user;
            $user->nom = $userData['LName'];
            $user->prenom = $userData['FName'];
            $user->email = $userData['Email'];
            $user->password = $userData['Password'];
            $user->save();
            //---------
            $postedUser->session()->flash('adding','L\'utilisateur été ajouté avec succés.');
            return redirect('/users');
        } catch (\Throwable $th) {
            echo $th;
        }
        return $user;
    }
}