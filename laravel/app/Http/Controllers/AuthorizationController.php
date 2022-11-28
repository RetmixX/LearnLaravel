<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Models\User;

class AuthorizationController
{
    public function authorization(AuthorizationRequest $request){
        $validation = $request->validated();
        $token = User::check($validation["email"], $validation["password"]);

        return response([
            "success"=>true,
            "message"=>"Authorization successful",
            "token"=>$token
        ]);
    }
}
