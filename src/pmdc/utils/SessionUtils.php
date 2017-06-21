<?php

namespace pmdc\utils;

class SessionUtils {
    private static $instance;
    
    public $accessToken;
    
    public $name;
    public $username;
    public $avatar;
    
    public function __construct() {
        session_start();
    }
    
    public function init() {
        self::$instance = $this;
    }
    
    public static function getInstance() {
        return self::$instance;
    }
    
    public function update() {
        $_SESSION["name"] = $this->name;
        $_SESSION["username"] = $this->username;
    }
    
    public function isAuthenticated(): bool {
        return $this->accessToken !== null;
    }
}
