<?php

namespace App\Infrastructure\User\Secondary\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Domain\User\Model\User;
use App\Domain\User\Model\UserRepositoryInterface;

class UserDoctrineRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getByEmail(string $email): ?User
    {
        return null;$this->findOneByEmail($email);
    }

    public function getById(string $id): ?User
    {
        return $this->findOneById($id);
    }

    public function delete(User $user): bool
    {

    }

    public function update(User $user): bool
    {

    }
    
    public function add(User $user): bool
    {
        
    }

    public function list(): iterable
    {

    }
}