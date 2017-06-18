<?php

namespace pmdc\entity;

class User {
    private $data = [];
    
    public function __construct(array $data) {
        $this->data = $data;
    }
    
    public function getId() {
        return $this->data["id"];
    }
    
    public function isAdmin() {
        return $this->data["role"] === "admin";
    }
    
    public function isJudge() {
        return $this->data["role"] === "judge" or $this->isAdmin();
    }
    
    public function getName() {
        return $this->data["name"];
    }
}
