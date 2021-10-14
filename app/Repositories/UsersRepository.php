<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UsersCollection;
use PDO;

class UsersRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=Todo', 'root', '');
    }

    public function addUser(User $user)
    {
        $sql = "INSERT INTO users(username, email, password) VALUES (?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$user->getName(), $user->getEmail(), $user->getPassword()]);
    }

    public function getUsers(): UsersCollection
    {
        $db = $this->pdo->query('SELECT * FROM users');
        $db->execute();
        $users = $db->fetchAll(PDO::FETCH_ASSOC);
        $collection = new UsersCollection();
        foreach ($users as $user) {
            $collection->insertUser((new User(
                $user['username'],
                $user['email'],
                $user['password']
            )));
        }
        return $collection;
    }


}