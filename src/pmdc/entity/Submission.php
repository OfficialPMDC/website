<?php

namespace pmdc\entity;

use pmdc\Main;

class Submission {
    private $data = [];
    
    public function __construct(array $data) {
        $this->data = $data;
    }
    
    public function getCreator() {
        return $this->data["creator"];
    }
    
    public function getName() {
        return $this->data["name"];
    }
    
    public function getContest() {
        return Main::getInstance()->getContestManager()->getContest($this->data["contest"]) ?? null;
    }
    
    public function submit() {
        Main::getInstance()->getContestManager()->addSubmission($this, $this->data);
    }
}
