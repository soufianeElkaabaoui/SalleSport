<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\_user;

class PlanningController extends Controller
{

    public function index()
    {
        return view('plannings');
    }

    public function index_planingCurd() {
        $courses = (new CoureController())->getCours();
        $coaches = (new userController())->coaches();
        $salles = (new SalleController())->getAllSalles();
        return view('planing',['AllCours' => $courses,'AllCoaches' => $coaches,'AllSalles' => $salles]);
    }
}
