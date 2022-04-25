<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\_user;
use App\Models\_salle;
use GuzzleHttp\Promise\Create;

class SalleController extends Controller
{
    //
    public function getSallesByPlanning(Request $req)
    {
        $salles = _user::find($req->coachID)->salles($req->givenDate)->get();

        return $salles;
    }
    public function Create(){
        return view('salle');
    }
    public function AllSalle(){
        // $data = _salle::orderby('id','DESC')->get();
        $data =_salle::all();
        return response()->json($data);

    }
    //Add Salle
    public function Add_Salle(Request $request){
        $request->validate([
            'nom'=>'required',
            'capacity'=>'required'
        ]);
        $data = _salle::insert([
            'nom'=>$request->nom,
            'capacity'=>$request->capacity
        ]);
        return response()->json($data);
    }
    //edit Salle

    public function EditSalle($id){
        $data = _salle::findOrFail($id);
        return response()->json($data);
    }
    // update Salle
    public function UpdateSalle(Request $request ,$id){
        $request->validate([
            'nom'=>'required',
            'capacity'=>'required'
        ]);
        $data = _salle::findOrFail($id)->update([
            'nom'=>$request->nom,
            'capacity'=>$request->capacity
        ]);
        return response()->json($data);

    }
    //delete Salle
    public  function DeleteSalle($id){
        $data=_salle::findOrFail($id)->delete(); 
        return response()->json($data);
    }
}
