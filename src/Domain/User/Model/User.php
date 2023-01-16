<?php

namespace App\Domain\User\Model;

class User
{
    private string $id;

    private string $email;

    private string $lastname;

    private string $firstname;

    private string $password;
    
    public function __construct(string $email, string $firstname, string $lastname, string $password)
    {
        $this->setEmail($email);

        $this->setFirstname($firstname);

        $this->setLastname($lastname);

        $this->setPassword($password);
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setFirstname(string $firstname): self
    {
        if(empty($firstname) || strlen($firstname) < 5) {
            throw new \Exception('wrong-firstname');
        }

        $this->firstname = $firstname;

        return $this;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setLastname(string $lastname): self
    {
        if(empty($lastname) || strlen($lastname) < 5) {
            throw new \Exception('wrong-lastname');
        }

        $this->lastname = $lastname;

        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setEmail(string $email): self
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('wrong-email');
        }
        $this->email = $email;
        
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): self
    {
        if(!$this->checkPassword($password)) {
            throw new \Exception('wrong-password');
        }

        $this->password = $password;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    private function checkPassword(string $password): bool
    {
        return true;
    }
}