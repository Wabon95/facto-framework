<?php

namespace App\Interfaces;

use App\Entity\User;


interface UserRepositoryInterface {
    public static function find(int $id);
    public static function findAll();
    public static function insert(User $user);
    public static function update(User $user);
}