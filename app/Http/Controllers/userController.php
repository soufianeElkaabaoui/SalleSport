<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // pour interagir avec la base de données.

use Illuminate\Http\Request;

class userController extends Controller
{
    // afficher les utilisateurs disponibles:
    public function index()
    {
        $usersRows = DB::table('_users')->get(); // pour obtenir tous les lignes de la table _users.
        return view('users', ['users' => $usersRows]); // pour appeler la page resources/views/users.blade.php et passer le paramétre necessite.
    }
}
