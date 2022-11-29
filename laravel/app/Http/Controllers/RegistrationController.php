<?php

namespace App\Http\Controllers;

use App\DTO\Response;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function head(){
        return response()->json(["message"=>"Test"]);
    }

    public function resgistration(RegistrationRequest $request){
        $validation = $request->validated();

        $user = User::create([
            "email"=>$validation["email"],
            "password"=>bcrypt($validation["password"]),
            "first_name"=>$validation["first_name"],
            "last_name"=>$validation["last_name"],
        ]);

        return response((new Response
        (true, "Registration successful"))
            ->responseMessage(), 201);
    }

}
