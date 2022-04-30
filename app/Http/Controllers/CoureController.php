<?php

namespace App\Http\Controllers;

use App\Models\_coure;
use Illuminate\Http\Request;
use App\Models\_user;

class CoureController extends Controller
{

    public function getCouresByPlanning(Request $req)
    {
        $coures = _user::find($req->coachID)->coures($req->givenDate)->get();

        return $coures;
    }

    public function getCours(){
        $Allcours = _coure::all();
        return $Allcours;
    }
}
