<?php

namespace App\DTO;

class AuthResponse extends ResponseMessage
{
    private string $token;
    public function __construct(bool $success, mixed $message, $token)
    {
        parent::__construct($success, $message);
        $this->token = $token;
    }

    public function responseMessage(): array
    {
        return [
            "success"=>$this->success,
            "message"=>$this->message,
            "token"=>$this->token
        ];
    }
}
