<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Planning;

class PlanningController extends Controller
{

    public function index()
    {
        return view('plannings');
    }

    public function index_planingCurd() {
        $Coures = (new CoureController())->getCour();
        $coaches = (new userController())->coaches();
        $salles = (new SalleController())->getAllSalles();
        return view('planing',['AllCour' => $Coures,'AllCoaches' => $coaches,'AllSalles' => $salles]);
    }
    public function getAllPlaning() {
        $AllPlaning = Planning::select('Plannings.id as idPlaning','date_seance','start_time','end_time','Cours.nom as Cnom','Salles.nom as SNom','Users.nom as nomCoach')
        ->join('Cours','Cours.id','Plannings.idCour')
        ->join('Salles','Salles.id','Plannings.idSalle')
        ->join('Users','Users.id','Plannings.idUser')
        ->get();
        return $AllPlaning;
    }
    public function AddPlaning(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'start' => 'required',
            'endT' => 'required',
            'Cour' => 'required',
            'salle' => 'required',
            'coach' => 'required'
        ]);
        $data = Planning::insert([
            'date_seance'  => $request->date,
            'start_time'   => $request->start,
            'end_time'     => $request->endT,
            'idCour'       => $request->Cour,
            'idSalle'      => $request->salle,
            'idUser'       => $request->coach
        ]);
        return response()->json($data);
    }
    //Fonction pour afficher les informations d'une planing
    public function editPlaning($id)
    {
        $data = Planning::findOrFail($id);
        return response()->json($data);
    }
    //Fonction pour envoyer les modification d'une planing
    public function updatePlaning(Request $request,$id)
    {
        $request->validate([
            'date' => 'required',
            'start' => 'required',
            'endT' => 'required',
            'Cour' => 'required',
            'salle' => 'required',
            'coach' => 'required'
        ]);
        $data = Planning::findOrFail($id)->update([
            'date_seance'  => $request->date,
            'start_time'   => $request->start,
            'end_time'     => $request->endT,
            'idCour'       => $request->Cour,
            'idSalle'      => $request->salle,
            'idUser'       => $request->coach
        ]);
        return response()->json($data);
    }
    //Fonction Pour Supprimer un planing
    public  function deletePlaning($id){
        $data=Planning::findOrFail($id)->delete();
        return response()->json($data);
    }
    // Fonction qui recupere le planing de la semaine current
    public function getPlaningHebdo()
    {
        $number_of_dayes = 7;
        $HebdoPlaning = Planning::select('Plannings.id as idPlaning','date_seance','start_time','end_time','Cours.nom as Cnom','Salles.nom as SNom','Users.nom as nomCoach','Users.prenom as prenomCoach')
        ->join('Cours','Cours.id','Plannings.idCour')
        ->join('Salles','Salles.id','Plannings.idSalle')
        ->join('Users','Users.id','Plannings.idUser')
        ->whereRaw($number_of_dayes,'DATEDIFF(day,date_seance,date("y-m-d")) <=')
        ->get();
        return $HebdoPlaning;
    }
}
