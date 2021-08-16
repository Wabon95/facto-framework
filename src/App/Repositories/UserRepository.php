<?php

namespace App\Repositories;

use App\Entity\User;
use Facto\Database\Database;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public static function find(int $id) : User | bool
    {
        $stmt = Database::getPDO()->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute([
            ':id' => $id
        ]);
        if ($userFromDB = $stmt->fetch()) {
            return (new User())
                ->setEmail($userFromDB['email'])
                ->setPassword($userFromDB['password'])
            ;
        }
        return false;
    }

    public static function findAll() : Array | bool
    {
        $stmt = Database::getPDO()->prepare("SELECT * FROM user");
        $stmt->execute();
        $usersToReturn = [];
        foreach ($users = $stmt->fetchAll() as $userFromDB) {
            $usersToReturn[] = (new User())
                ->setId($userFromDB['id'])
                ->setEmail($userFromDB['email'])
                ->setPassword($userFromDB['password'])
            ;
        }
        if ($usersToReturn) {
            return $usersToReturn;
        }

        return false;
    }

    public static function insert(User $user) : User
    {
        $stmt = Database::getPDO()->prepare("INSERT INTO user (email, password) VALUES (:email, :password)");
        $stmt->execute([
            ':email' => $user->getEmail(),
            ':password' => password_hash($user->getPassword(), PASSWORD_BCRYPT)
        ]);
        $user->setId(Database::getPDO()->lastInsertId());

        return $user;
    }

    public static function update(User $user) : User
    {
        
    }

}