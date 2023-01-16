<?php

namespace App\Domain\SharedContext\Model;

abstract class DoctrineItem
{
    public function __construct(private string $id) 
    {
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}