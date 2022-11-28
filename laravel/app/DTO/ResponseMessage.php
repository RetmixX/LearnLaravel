<?php

namespace App\DTO;

abstract class ResponseMessage
{
    protected bool $success;
    protected mixed $message;

    public function __construct(bool $success, mixed $message){
        $this->success = $success;
        $this->message = $message;
    }

    public function responseMessage(): array{
        return [
            "success"=>$this->success,
            "message"=>$this->message
        ];
    }

}
