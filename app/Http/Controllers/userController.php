<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // pour interagir avec la base de données.
use App\Models\_user;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function coach_count()
    {
        //------------------
        $usersRows = _user::all();
        $userCount = count($usersRows);
        return $userCount;
    }
    public function Create_coach(){
        return view('coach');
    }
    public function AllCoach(){
        // $data = _salle::orderby('id','DESC')->get();
        $data =_user::all();
        return response()->json($data);

    }
    //Add Coach
    public function Add_Coach(Request $request){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
        ]);
        $data = _user::insert([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email
        ]);
        return response()->json($data);
    }
    //edit Coach

    public function EditCoach($id){
        $data = _user::findOrFail($id);
        return response()->json($data);
    }
    // update Coach
    public function UpdateCoach(Request $request ,$id){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
        ]);
        $data =_user::findOrFail($id)->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email
        ]);
        return response()->json($data);
       
    }
    //delete Coach
    public  function Delet_Coach($id){
        $data=_user::findOrFail($id)->delete(); 
        return response()->json($data);
    }


    //end Function Coach
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
    // afficher la page de modification:
    public function edituserGet($userid)
    {
        $updatedUser = _user::find($userid);
        return view('edituser', ['user' => $updatedUser]);
    }
    // modifier un utilisateur:
    public function edituserPost(Request $modifiedUserData)
    {
        $modifiedUser = _user::find($modifiedUserData->id); // pour trouver un utilisateur avec son id(///PRIMARY KEY).
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
        $deletedUser = _user::find($userid);
        $result = $deletedUser->delete();
        if ($result) {
	        // session variable ...
            return redirect('/users');
        } else {
            return ['result' => "Date hasn't been updated"];
        }
    }


    public function logoutUser(Request $request) {
        $request->session()->forget('nom');
        return redirect('/');
     }
}
