<?php

namespace App\DTO;

class CreateFolderResponse extends ResponseMessage
{
    private string $folderId;
    public function __construct(bool $success, mixed $message, string $folderId)
    {
        parent::__construct($success, $message);
        $this->folderId = $folderId;
    }

    public function responseMessage(): array
    {
        return [
            "success"=>$this->success,
            "message"=>$this->message,
            "folder_id"=>$this->folderId
        ];
    }
}
