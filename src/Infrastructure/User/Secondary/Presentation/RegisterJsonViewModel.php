<?php

namespace App\Infrastructure\User\Secondary\Presentation;

class RegisterJsonViewModel
{
    public array $data;

    public function addData(string $type, string $id, string $code)
    {
        $this->data[$type][$id] = $code;
    }

    public function data(): array
    {
        return $this->data;
    }
}