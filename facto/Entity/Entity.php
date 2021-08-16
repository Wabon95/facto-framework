<?php

namespace Facto\Entity;

class Entity {
    protected int $id;

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id) : self
    {
        $this->id = $id;
        return $this;
    }
}