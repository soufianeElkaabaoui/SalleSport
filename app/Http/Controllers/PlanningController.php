<?php

namespace App\Http\Controllers;

use App\Models\_user;
use APP\Models\_coure;
use App\Models\_planning;
use Illuminate\Http\Request;
use App\Http\Controllers\userController;
use App\Http\Controllers\CoureController;
use App\Http\Controllers\SalleController;

class PlanningController extends Controller
{

    public function index()
    {
        return view('plannings');
    }

    public function index_planingCurd() {
        $courses = (new CoureController())->AllCours();
        $coaches = (new userController())->AllCoach();
        $salles = (new SalleController())->getAllSalles();
        return view('planing',['AllCours' => $courses,'AllCoaches' => $coaches,'AllSalles' => $salles]);
    }
    public function getAllPlaning() {
        $AllPlaning = _planning::select('_plannings.id as idPlaning','date_seance','start_time','end_time','_coures.nom as Cnom','_salles.nom as SNom','_users.nom as nomCoach')
        ->join('_coures','_coures.id','_plannings.idCour')
        ->join('_salles','_salles.id','_plannings.idSalle')
        ->join('_users','_users.id','_plannings.idUser')
        ->get();
        return $AllPlaning;
    }
    public function AddPlaning(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'start' => 'required',
            'endT' => 'required',
            'cours' => 'required',
            'salle' => 'required',
            'coach' => 'required'
        ]);
        $data = _planning::insert([
            'date_seance'  => $request->date,
            'start_time'   => $request->start,
            'end_time'     => $request->endT,
            'idCour'       => $request->cours,
            'idSalle'      => $request->salle,
            'idUser'       => $request->coach
        ]);
        return response()->json($data);
    }
    //Fonction pour afficher les informations d'une planing
    public function editPlaning($id)
    {
        $data = _planning::findOrFail($id);
        return response()->json($data);
    }
    //Fonction pour envoyer les modification d'une planing
    public function updatePlaning(Request $request,$id)
    {
        $request->validate([
            'date' => 'required',
            'start' => 'required',
            'endT' => 'required',
            'cours' => 'required',
            'salle' => 'required',
            'coach' => 'required'
        ]);
        $data = _planning::findOrFail($id)->update([
            'date_seance'  => $request->date,
            'start_time'   => $request->start,
            'end_time'     => $request->endT,
            'idCour'       => $request->cours,
            'idSalle'      => $request->salle,
            'idUser'       => $request->coach
        ]);
        return response()->json($data);
    }
    //Fonction Pour Supprimer un planing
    public  function deletePlaning($id){
        $data=_planning::findOrFail($id)->delete(); 
        return response()->json($data);
    }
    // Fonction qui recupere le planing de la semaine current
    public function getPlaningHebdo()
    {
        $number_of_dayes = 7;
        $HebdoPlaning = _planning::select('_plannings.id as idPlaning','date_seance','start_time','end_time','_coures.nom as Cnom','_salles.nom as SNom','_users.nom as nomCoach','_users.prenom as prenomCoach')
        ->join('_coures','_coures.id','_plannings.idCour')
        ->join('_salles','_salles.id','_plannings.idSalle')
        ->join('_users','_users.id','_plannings.idUser')
        ->whereRaw($number_of_dayes,'DATEDIFF(day,date_seance,date("y-m-d")) <=')
        ->get();
        return $HebdoPlaning;
    }
}
