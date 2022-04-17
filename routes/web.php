<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; // pour interagir avec la base de données.
use App\Http\Controllers\userController;

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

Route::get('/users', [userController::class, 'index']); // raccourci pour faire appeler la fonction index du controller userController.

Route::view('/adduser', 'adduser'); // raccourci pour faire lier une adresse url avec une page html(view).
Route::post('/adduser', [userController::class, 'adduser']); // raccourci pour faire appeler une methode d'insertion d'un utilisateur.

Route::get('/edituser/{id}', [userController::class, 'edituserGet']);
Route::put('/edituser', [userController::class, 'edituserPost']);

Route::get('deleteuser/{id}', [userController::class, 'deleteuser']);

Route::view('uploadfile', 'uploadfile');
Route::post('/uploadfile', [userController::class, 'getFile']);
