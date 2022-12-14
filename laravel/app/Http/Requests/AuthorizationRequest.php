<?php

namespace App\Http\Requests;

use App\DTO\ErrorResponse;
use App\DTO\ValidationError\ValidationFiled;
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
        ValidationFiled::fieldValidation($validator);
    }
}
