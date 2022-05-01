<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Salle;
use GuzzleHttp\Promise\Create;

class SalleController extends Controller
{
    //
    public function getSallesByPlanning(Request $req)
    {
        $salles = User::find($req->coachID)->salles($req->givenDate)->get();

        return $salles;
    }
    public function Create(){
        return view('salle');
    }
    public function AllSalle(){
        // $data = Salle::orderby('id','DESC')->get();
        $data =Salle::all();
        return response()->json($data);

    }
    //Add Salle
    public function AddSalle(Request $request){
        $request->validate([
            'nom'=>'required',
            'capacity'=>'required'
        ]);
        $data = Salle::insert([
            'nom'=>$request->nom,
            'capacity'=>$request->capacity
        ]);
        return response()->json($data);
    }
    //edit Salle

    public function EditSalle($id){
        $data = Salle::findOrFail($id);
        return response()->json($data);
    }
    // update Salle
    public function UpdateSalle(Request $request ,$id){
        $request->validate([
            'nom'=>'required',
            'capacity'=>'required'
        ]);
        $data = Salle::findOrFail($id)->update([
            'nom'=>$request->nom,
            'capacity'=>$request->capacity
        ]);
        return response()->json($data);

    }
    //delete Salle
    public  function DeleteSalle($id){
        $data=Salle::findOrFail($id)->delete();
        return response()->json($data);
    }

    public function getAllSalles()
    {
        $AllSalles = Salle::all();
        return $AllSalles;
    }
}
