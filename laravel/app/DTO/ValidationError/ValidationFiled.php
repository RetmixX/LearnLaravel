<?php

namespace App\DTO\ValidationError;

use App\DTO\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidationFiled
{
    public static function fieldValidation(Validator $validator){
        $errors = "";
        foreach ($validator->errors()->all() as $item) {
            $item = substr($item, 0, -1);
            $errors = $errors.$item.". ";
        }

        $errors = substr($errors, 0,-2).". ";
        throw new HttpResponseException(response()->json(
            (new ErrorResponse(false, $errors))->responseMessage()
            , 400));
    }
}
