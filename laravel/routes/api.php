<?php

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

Route::post("registration", [\App\Http\Controllers\RegistrationController::class, "registration"]);
Route::post("authorization", [\App\Http\Controllers\AuthorizationController::class, "authorization"])
    ->middleware("noAuth");

Route::middleware(["checkAuth"])->group(function (){
   Route::get("logout", [\App\Http\Controllers\LogoutController::class, "logout"]);
   Route::post("folders", [\App\Http\Controllers\FolderController::class, "createFolder"]);
   Route::get("folders/{folder_id}", [\App\Http\Controllers\FolderController::class, "deleteFolder"]);
});



