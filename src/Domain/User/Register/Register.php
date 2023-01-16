<?php

namespace App\Domain\User\Register;

use App\Domain\User\Model\User;
use App\Domain\User\Model\UserRepositoryInterface;

class Register
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function execute(RegisterRequest $request, RegisterPresenterInterface $presenter): void
    {
        $response = new RegisterResponse();        
        $this->doExecute($request, $response);
        $presenter->present($response);
    }

    private function doExecute(RegisterRequest $request, RegisterResponse $response): void
    {
        $user = $this->checkUser($request, $response);
        if(null === $user ) {
            return;
        }
        
        $this->repository->add($user);
        $response->addInfo('user', 'created');
    }

    private function checkUser(RegisterRequest $request, RegisterResponse $response): ?User
    {
        if(empty($request->email)) {
            $response->addError('email', 'no-email');
            
            return null;
        }

        if(empty($request->firstname)) {
            $response->addError('firstname', 'no-firstname');
            
            return null;
        }

        if(empty($request->lastname)) {
            $response->addError('lastname', 'no-lastname');
            
            return null;
        }

        if(empty($request->password)) {
            $response->addError('password', 'no-password');
            
            return null;
        }

        $user = $this->repository->getByEmail($request->email);
        if(!empty($user)) {
            $response->addError('user', 'user-already-exist');

            return null;
        }

        try {
            $user = new User(
                $request->email,
                $request->firstname, 
                $request->lastname,
                $request->password
            );

            return $user;
        }catch(\Exception $e) {
            $response->addError('user', $e->getMessage());

            return null;
        }
    }

    
}