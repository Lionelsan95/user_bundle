<?php

namespace App\Infrastructure\User\Secondary\Presentation;

use App\Domain\User\Register\RegisterResponse;
use App\Domain\User\Register\RegisterPresenterInterface;

class RegisterCmdPresenter implements RegisterPresenterInterface
{
    public function present(RegisterResponse $response): void
    {
        
    }
}