<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // pour interagir avec la base de données.
use App\Models\User;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function coach_count()
    {
        //------------------
        $usersRows = User::all();
        $userCount = count($usersRows);
        return $userCount;
    }
    public function Create_coach(){
        return view('coach');
    }
    public function AllCoach(){
        // $data = _salle::orderby('id','DESC')->get();
        $data =User::all();
        return response()->json($data);

    }
    //Add Coach
    public function Add_Coach(Request $request){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
        ]);
        $data = User::insert([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email
        ]);
        return response()->json($data);
    }
    //edit Coach

    public function EditCoach($id){
        $data = User::findOrFail($id);
        return response()->json($data);
    }
    // update Coach
    public function UpdateCoach(Request $request, $id){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required',
        ]);

        $data =User::findOrFail($id)->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'email'=>$request->email
        ]);
        return response()->json($data);

    }
    //delete Coach
    public  function Delet_Coach($id){
        $data=User::findOrFail($id)->delete();
        return response()->json($data);
    }


    //end Function Coach
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

    public function logoutUser(Request $request) {
        $request->session()->forget('nom');
        return redirect('/');
     }
}
