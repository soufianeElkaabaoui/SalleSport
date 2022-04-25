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
}
