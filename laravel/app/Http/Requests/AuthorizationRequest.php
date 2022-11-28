<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthorizationRequest extends FormRequest
{
    public function rules(){
        return [
            "email"=>"required",
            "password"=>"required"
        ];
    }

    public function fieldValidation(Validator $validator){
        $errors = "";
        foreach ($validator->errors()->all() as $item) {
            $item = substr($item, 0, -1);
            $errors = $errors.$item.". ";
        }

        $errors = substr($errors, 0,-2).". ";
        throw new HttpResponseException(response()->json([
            "success"=>false,
            "message"=>$errors
        ], 400));
    }
}
