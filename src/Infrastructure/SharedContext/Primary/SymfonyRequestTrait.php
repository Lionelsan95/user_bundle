<?php

namespace App\Infrastructure\SharedContext\Primary;

use App\Domain\User\Register\RegisterRequest;
use Symfony\Component\HttpFoundation\Request;

trait SymfonyRequestTrait
{
    public function fromPostToRegisterRequest(Request $request): RegisterRequest
    {
        $data = $request->request->all();

        $registerRequest = new RegisterRequest();
        
        if(!empty($data['email'])) {
            $registerRequest->email = $data['email'];
        }

        if(!empty($data['firstname'])) {
            $registerRequest->firstname = $data['firstname'];
        }
        
        if(!empty($data['lastname'])) {
            $registerRequest->lastname = $data['lastname'];
        }
        
        if(!empty($data['password'])) {
            $registerRequest->password = $data['password'];
        }

        return $registerRequest;
    }

    public function extractGETData(Request $request): RegisterRequest
    {
        $data = $request->query->all();

        $registerRequest = new RegisterRequest();
        
        if(!empty($data['email'])) {
            $registerRequest->email = $email;
        }

        if(!empty($data['firstname'])) {
            $registerRequest->firstname = $firstname;
        }
        
        if(!empty($data['lastname'])) {
            $registerRequest->lastname = $lastname;
        }
        
        if(!empty($data['password'])) {
            $registerRequest->password = $password;
        }

        return $registerRequest;
    }
}