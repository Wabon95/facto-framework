<?php

namespace App\Entity;

use Facto\Entity\Entity;

class User extends Entity {

    private string $email;
    private string $password;

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setEmail(string $email) : self
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password) : self
    {
        $this->password = $password;
        return $this;
    }
}