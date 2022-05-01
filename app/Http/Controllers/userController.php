<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // pour interagir avec la base de données.
use App\Models\User;

use Illuminate\Http\Request;

class userController extends Controller
{
    // afficher les utilisateurs disponibles:
    public function index()
    {
        // $usersRows = DB::table('Users')->get(); // pour obtenir tous les lignes de la table Users.
        // return view('users', ['users' => $usersRows]); // pour appeler la page resources/views/users.blade.php et passer le paramétre necessite.
        //------------------
        $usersRows = User::all();
        return view('coach', ['users' => $usersRows]);
    }

    public function coach_index()
    {
        //------------------
        $usersRows = User::all();
        $userCount = count($usersRows);
        return view('dashboard', ['users' => $usersRows,'countUsers' => $userCount]);
    }
    public function coaches()
    {
        //------------------
        $coaches = User::all();

        return $coaches;
    }
    // pour l'authentification d'un utilisateur:
    public function login(Request $loggedUser)
    {
        try
        {
            $user = User::where('email', $loggedUser->email)
                            ->where('password', $loggedUser->password)
                            ->get(); // select * from Users where email = '' and password = ''
            if (count($user) > 0)
            {
                $loggedUser->session()->put('email', $user[0]['email']);
                $loggedUser->session()->put('password', $user[0]['password']);
                $loggedUser->session()->flash('nom', $user[0]['nom'] . " " . $user[0]['prenom']);
                return redirect('/dashboard');
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
            $user = new User;
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
    // afficher la page de modification:
    public function edituserGet($userid)
    {
        $updatedUser = User::find($userid);
        return view('edituser', ['user' => $updatedUser]);
    }
    // modifier un utilisateur:
    public function edituserPost(Request $modifiedUserData)
    {
        $modifiedUser = User::find($modifiedUserData->id); // pour trouver un utilisateur avec son id(///PRIMARY KEY).
        $modifiedUser->nom = $modifiedUserData->LName;
        $modifiedUser->prenom = $modifiedUserData->FName;
        $modifiedUser->email = $modifiedUserData->Email;
        $modifiedUser->password = $modifiedUserData->Password;
        $result = $modifiedUser->save(); // dans ce cas, cette fonction va nous permettre de faire la modification.
        if ($result) {
            // session variable ...
            return redirect('/users');
        } else {
            return ['result' => "Date hasn't been updated"];
        }
    }
    // supprimer un utilisateur:
    public function deleteuser($userid)
    {
        $deletedUser = User::find($userid);
        $result = $deletedUser->delete();
        if ($result) {
	        // session variable ...
            return redirect('/users');
        } else {
            return ['result' => "Date hasn't been updated"];
        }
    }

    public function getFile(Request $request)
    {
        // $CourSelected = Cours::find($id);
        if ($request->hasFile('photouploaded')) {
            $nameFile = $request->photouploaded->path();
        }else{
            $nameFile = "no photo";
        }
        // $guessExtension = $request->file('photopath')->guessExtension();
        // $fullPath = 'Storage/app/imageCour/' . $nameFile . $guessExtension;
        // $request->file('photopath')->storeAs('imageCour',$nameFile .'.'. $guessExtension);
        // $CourSelected->update([
        //     'nom' => $request->nom,
        //     'photopath' => $fullPath
        // ]);

        // return redirect()->route('Cour_view.index');
        return $nameFile;
    }

    public function logoutUser(Request $request) {
        $request->session()->forget('nom');
        return redirect('/');
     }
}
