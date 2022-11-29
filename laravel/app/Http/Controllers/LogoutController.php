<?php

namespace App\Http\Controllers;

use App\DTO\Response;
use App\Models\User;

class LogoutController extends Controller
{
    public function logout(){
        $token = request()->header("token");
        User::logout($token);

        return response()->json(
            (new Response(true, "Logout successful"))->responseMessage());
    }
}
