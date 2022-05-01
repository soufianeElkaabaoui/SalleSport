<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use Illuminate\Http\Request;
use App\Models\User;

class CoureController extends Controller
{

    public function getCouresByPlanning(Request $req)
    {
        $coures = User::find($req->coachID)->coures($req->givenDate)->get();

        return $coures;
    }

    public function getCour(){
        $AllCour = Cour::all();
        return $AllCour;
    }
}
