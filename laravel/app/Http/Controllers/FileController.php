<?php

namespace App\Http\Controllers;

use App\DTO\Response;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadFile(){
        return response()->json((new Response(true, "Test"))->responseMessage());
    }

    public function downloadFile(){

    }
}
