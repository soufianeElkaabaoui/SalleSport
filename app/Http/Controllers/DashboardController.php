<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\CoureController;
use App\Http\Controllers\userController;
class DashboardController extends Controller
{
    public function index()
    {
        // $salle = new SalleController();
        $salleCount =  (new SalleController())->Salle_Count();
        $courCount =  (new CoureController())->cour_count();
        $userCount =  (new userController())->coach_count();
        return view('dashboard', compact('salleCount', 'courCount', 'userCount'));
    }
}
