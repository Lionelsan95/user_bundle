<?php

namespace App\Domain\User\Model;

interface UserRepositoryInterface
{
    public function getByEmail(string $email): ?User;

    public function getById(string $id): ?User;

    public function delete(User $user): bool;

    public function update(User $user): bool;
    
    public function add(User $user): bool;

    public function list(): iterable;
}