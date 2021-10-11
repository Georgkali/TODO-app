<?php

namespace App\Models;

use App\Models\User;

class UsersCollection
{
    private ?array $users;

    public function __construct(array $users = [])
    {
        $this->users = $users;
    }
    public function insertUser(User $user) {
        $this->users[] = $user;
    }

    public function getUsers(): ?array
    {
        return $this->users;
    }
}

