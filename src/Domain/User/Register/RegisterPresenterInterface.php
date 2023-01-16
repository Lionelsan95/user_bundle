<?php

namespace App\Domain\User\Register;

interface RegisterPresenterInterface
{
    public function present(RegisterResponse $response): void;
}