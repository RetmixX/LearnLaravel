<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class TestFileController extends Controller
{
    public function createFolder(){
        $nameFolder = request()->get("folder");
        Storage::makeDirectory($nameFolder);
    }

    public function createFile(){
        $nameFile = request()->file()["filename"]->getClientOriginalName();
        echo $nameFile;
        $fileContent = request()->file()["filename"]->getContent();
        Storage::put($nameFile, $fileContent);
    }
}
