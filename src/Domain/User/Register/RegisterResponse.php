<?php

namespace App\Domain\User\Register;

class RegisterResponse
{
    private array $messages;

    public function __construct()
    {
        $this->messages = [];
    }

    public function messages(): array
    {
        return $this->messages;
    }

    public function addError(string $id, string $code)
    {
        $this->messages['error'][$id] = $code;
    }

    public function addInfo(string $id, string $code)
    {
        $this->messages['info'][$id] = $code;
    }
}