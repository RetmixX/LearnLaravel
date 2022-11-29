<?php

namespace App\Models;

use App\DTO\ErrorResponse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;


/**
 * @property $id
 * @property $email
 * @property $password
 * @property $first_name
 * @property $last_name
 * @property $token
 */
class User extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    public $table = "users";

    public $fillable = [
        "email",
        "password",
        "first_name",
        "last_name",
    ];

    public static function check($email, $password): string
    {
        $user = User::query()->where("email", "=", $email)->first();
        if ($user === null)
            throw new HttpResponseException(response()->json(
                (new ErrorResponse(false, "User with email " . $email . " not found"))
                    ->responseMessage(), 400
            ));

        if (!Hash::check($password, $user->password))
            throw new HttpResponseException(response()->json([
                "success"=>false,
                "message"=>"Invalid password"
            ], 400));

        $token = md5(microtime()."retmix".time());

        User::where("email", $email)->update(["token"=>$token]);

        return $token;
    }

    //Если пользователь с переданным токеном не найден, то true, иначе false
    public static function findUserOnToken(string $token): bool{
        return User::where("token", $token)->first()===null;
    }

    public static function logout($token){
        User::where("token", $token)->update(["token"=>""]);
    }

}
