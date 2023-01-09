<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\UtilisateursController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('admin', PostController::class) ;// cette permet de recuperé les donnees de l'API
Route::post('posts/edit/{id}', [PostController::class, "edit"]);// cette permet de modifier les donnees d'un Utilisateur grace a son id'


Route::group(['middleware' => ['web']], function () {

});
Route::delete('posts/destroy/{id}', [PostController::class, "destroy"]);
Route::get('/posts', [PostController::class, "data"]);
Route::get('/posts/{id}', [PostController::class, "show"]);
Route::post('/posts/create', [PostController::class, "create"]);
Route::patch('posts/update/{id}', [PostController::class, "update"]);


