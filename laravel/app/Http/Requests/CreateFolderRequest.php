<?php

namespace App\Http\Requests;

use App\DTO\ValidationError\ValidationFiled;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateFolderRequest extends FormRequest
{
    public function rules(){
        return [
            "name"=>"required",
            "parent_id"=>"required"
        ];
    }

    public function fieldValidation(Validator $validator){
        ValidationFiled::fieldValidation($validator);
    }
}
