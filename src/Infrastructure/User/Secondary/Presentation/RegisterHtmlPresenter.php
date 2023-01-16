<?php

namespace App\Infrastructure\User\Secondary\Presentation;

use App\Domain\User\Register\RegisterResponse;
use App\Domain\User\Register\RegisterPresenterInterface;

class RegisterHtmlPresenter implements RegisterPresenterInterface
{
    public function present(RegisterResponse $response): void
    {
        
    }
}