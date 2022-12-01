<?php

namespace App\Models;

use App\DTO\ErrorResponse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;


/**
 * @property $folder_id
 * @property $name
 * @property $parent_id
 * @property $author_id
 */
class Folder extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    public function files(){
        return $this->hasMany(File::class, "folder_id");
    }

    public $fillable = [
        "folder_id",
        "name",
        "parent_id",
        "author_id"
    ];

    public static function createFolder(string $folderId, string $name, string $parentId, string $token){
        $folders = Folder::all()->where("parent_id", "=" , $parentId)->all();
        $user = User::where("token", $token)->first();
        if (self::folderExist($folders, $name, $user))
            throw new HttpResponseException(response()->json(
                (new ErrorResponse(false,
                    "A folder with the same name already exists in this directory"))
                ->responseMessage(), 400));

        Folder::create([
            "folder_id"=>$folderId,
            "name"=>$name,
            "parent_id"=>$parentId,
            "author_id"=>$user->id,
        ]);
    }

    public static function deleteFolder(string $folderId){
        $mainFolder = Folder::where("folder_id", $folderId)->first();
        //Только 1 слой, надо сделать рекурсию для просмотра всех файлов
        $folders = Folder::all()->where("parent_id", "=", $mainFolder->folder_id)->all();
        $test = 1;
    }

    //Если такая папка существует в разделе, то true, иначе false
    private static function folderExist(array $folders, string $name, User $user):bool{
        foreach ($folders as $folder){
            if ($folder->name === $name && $folder->author_id === $user->id)
                return true;
        }
        return false;
    }


}
