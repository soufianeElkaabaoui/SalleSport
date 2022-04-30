<?php

use App\Http\Controllers\SalleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // pour interagir avec la base de données.
use App\Http\Controllers\userController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\CoureController;
use App\Http\Controllers\SallePlaning;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [userController::class, 'login']);
Route::get('/logout',[userController::class, 'logoutUser']);

//Route::get('/users', [userController::class, 'index']); // raccourci pour faire appeler la fonction index du controller userController.

Route::view('/adduser', 'adduser'); // raccourci pour faire lier une adresse url avec une page html(view).
Route::post('/adduser', [userController::class, 'adduser']); // raccourci pour faire appeler une methode d'insertion d'un utilisateur.

Route::get('/edituser/{id}', [userController::class, 'edituserGet']);
Route::put('/edituser', [userController::class, 'edituserPost']);

Route::get('deleteuser/{id}', [userController::class, 'deleteuser']);

Route::view('uploadfile', 'uploadfile');
Route::post('/uploadfile', [userController::class, 'getFile']);

Route::get('/dashboard', [userController::class, 'coach_index']);

Route::get('/coach',[userController::class, 'index']);

Route::get('/cours',function() {
    return view('cours');
});

//Start Planing Router
Route::get('/planing',[PlanningController::class, 'index_planingCurd']);
Route::get('/planing/all',[PlanningController::class, 'getAllPlaning']);
Route::post('/planing/add_planing/',[PlanningController::class, 'AddPlaning']);
Route::get('/planing/editPlaning/{id}',[PlanningController::class, 'editPlaning']);
Route::post('/planing/updatePlaning/{id}',[PlanningController::class,'updatePlaning']);
Route::get('/planing/deletePlaning/{id}',[PlanningController::class,'deletePlaning']);
Route::get('/planing/hebdo',[PlanningController::class, 'getPlaningHebdo']);
//End Planing Router

Route::get('/salles-planning', [SalleController::class, 'getSallesByPlanning']);
Route::get('/coures-planning', [CoureController::class, 'getCouresByPlanning']);
Route::get('/plannings', [PlanningController::class, 'index']);
Route::get('/coaches', [userController::class, 'coaches']);
//Start Routes Salle
Route::get('/salle',[SalleController::class,'Create']);
Route::get('/salle/all', [SalleController::class,'AllSalle']);
Route::post('/salle/Add_Salle/',[SalleController::class,'Add_Salle']);
Route::get('/salle/editSalle/{id}', [SalleController::class,'EditSalle']);
Route::post('/salle/Update_Salle/{id}',[SalleController::class,'UpdateSalle']);
Route::get('/salle/DeleteSalle/{id}',[SalleController::class,'DeleteSalle']);
//End Routes Salle
