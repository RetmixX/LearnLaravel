<?php

namespace App\Http\Controllers;

use App\DTO\CreateFolderResponse;
use App\DTO\Response;
use App\Http\Requests\CreateFolderRequest;
use App\Models\Folder;
use App\Tools\IdGenerate;

class FolderController extends Controller
{
    public function createFolder(CreateFolderRequest $request){
        $validation = $request->validated();
        $idFolder = IdGenerate::generate();
        Folder::createFolder($idFolder, $validation["name"], $validation["parent_id"],
            $request->header("token"));

        return response((new CreateFolderResponse(true, "Folder created", $idFolder))
            ->responseMessage(), 201);
    }

    public function deleteFolder(string $folderId){
        Folder::deleteFolder($folderId);
    }

    public function renameFolder(){

    }

}
