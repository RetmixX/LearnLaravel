<?php

namespace App\Models;

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
            throw new HttpResponseException(response()->json([
                "success" => false,
                "message" => "User with email " . $email . " not found"
            ]));

        if (!Hash::check($password, $user->password))
            throw new HttpResponseException(response()->json([
                "success"=>false,
                "message"=>"Invalid password"
            ], 400));

        if (!empty($user->token))
            throw new HttpResponseException(response()->json([
                "success"=>false,
                "message"=>"User already authorization"
            ], 400));

        $token = md5(microtime()."retmix".time());

        User::where("email", $email)->update(["token"=>$token]);

        return $token;
    }

}
