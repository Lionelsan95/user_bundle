<?php

namespace App\Infrastructure\User\Secondary\Presentation;

use App\Domain\User\Register\RegisterResponse;
use App\Domain\User\Register\RegisterPresenterInterface;

class RegisterJsonPresenter implements RegisterPresenterInterface
{
    private RegisterJsonViewModel $viewModel;

    public function present(RegisterResponse $response): void
    {
        $this->viewModel = new RegisterJsonViewModel();
        
        foreach($response->messages() as $type => $value) {
            foreach($value as $key => $val){
                $this->viewModel->addData($type, $key, $val);
            }
        }
    }

    public function viewModel(): RegisterJsonViewModel
    {
        return $this->viewModel;
    }
}