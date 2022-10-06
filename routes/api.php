<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//route pour la liste des ecoles
Route::get('/index', [indexController::class, 'index']);
//route pour creer un utilisateur
Route::post('/create_use', [indexController::class, 'create_use']);
//route pour se connecter
Route::post('/login', [indexController::class, 'login']);
//route pour reccuperer une ecole en fonction de son id
Route::post('/find', [indexController::class, 'find']);
//route pour chercher une ecole
Route::post('/searchSchool', [indexController::class, 'searchSchool']);
