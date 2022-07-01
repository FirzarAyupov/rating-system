<?php

class User
{
    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
    public function setName(string $username): void
    {
        $this->name = $username;
    }

    public function getLogin(): string
    {
        return $this->login;
    }
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(string $id): void
    {
        $this->id = $id;
    }
}
