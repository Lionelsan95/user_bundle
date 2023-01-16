<?php

namespace App\Domain\User\Register;

class RegisterRequest
{    
    public string $email;

    public string $firstname;

    public string $lastname;

    public string $password;
}