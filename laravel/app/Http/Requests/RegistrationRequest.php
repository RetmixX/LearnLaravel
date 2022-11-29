<?php

namespace App\Http\Requests;

use App\DTO\ErrorResponse;
use App\Rules\CustomPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegistrationRequest extends FormRequest
{
    public function rules(){
        return [
            "email"=>"required|string|email|unique:users",
            "password"=>["required", new CustomPassword()],
            "first_name"=>"required",
            "last_name"=>"required",
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = "";
        foreach ($validator->errors()->all() as $error){
            $error = substr($error, 0, -1);
            $errors = $errors.$error.". ";
        }
        $errors = substr($errors, 0,-2).".";
        throw new HttpResponseException(response()->json(
            (new ErrorResponse(false, $errors))->responseMessage()
            , 400));
    }

}
