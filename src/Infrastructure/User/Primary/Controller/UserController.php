<?php

namespace App\Infrastructure\User\Primary\Controller;

use App\Domain\User\Register\Register;
use App\Domain\User\Register\RegisterRequest;
use App\Infrastructure\SharedContext\Primary\SymfonyRequestTrait;
use App\Infrastructure\User\Secondary\Presentation\RegisterJsonPresenter;
use App\Infrastructure\User\Secondary\Presentation\RegisterJsonViewModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/user', name: 'App_user_')]
class UserController extends AbstractController
{
    use SymfonyRequestTrait;

    public function __construct(
        private RegisterRequest $registerRequest, 
        private RegisterJsonPresenter $presenter, 
        private RegisterJsonViewModel $view, 
        private Register $register
    ) {
    }
    
    #[Route('/', name: 'create', methods: 'POST')]
    public function register(Request $request): JsonResponse
    {
        $this->register->execute($this->fromPostToRegisterRequest($request), $this->presenter);

        return new JsonResponse($this->presenter->viewModel()->data());
    }
}