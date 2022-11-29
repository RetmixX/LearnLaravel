<?php

namespace App\Http\Controllers;

use App\DTO\AuthResponse;
use App\Http\Requests\AuthorizationRequest;
use App\Models\User;

class AuthorizationController extends Controller
{
    public function authorization(AuthorizationRequest $request){
        $validation = $request->validated();
        $token = User::check($validation["email"], $validation["password"]);

        return response((new AuthResponse(
            true, "Authorization successful", $token))
            ->responseMessage());
    }
}
