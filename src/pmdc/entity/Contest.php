<?php

namespace pmdc\entity;

use pmdc\Main;

class Contest {
    private $data = [];
    
    public function __construct(array $data) {
        $this->data = $data;
    }
    
    public function getId() {
        return $this->data["id"];
    }
    
    public function isRunning() {
        return $this->data["state"] === "open";
    }
    
    public function getTheme() {
        return $this->data["theme"];
    }
    
    /**
     * Short-hand for creating this contest.
     */
    public function create() {
        Main::getInstance()->getContestManager()->addContest($this, $this->data);
    }
}
