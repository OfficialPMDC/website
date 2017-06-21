<?php

namespace pmdc\entity;

use pmdc\Main;

class Contest {
    private $data = [];
    
    public function __construct(array $data) {
        $this->data = $data;
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function getId(): int {
        return $this->data["id"];
    }
    
    public function getName(): string {
        return $this->data["name"];
    }
    
    public function getShortDescription() {
        return $this->data["short-description"];
    }
    
    public function getDescription(): string {
        return $this->data["description"];
    }
    
    // TODO: make the rules an array before release
    public function getRules(): string {
        return $this->data["rules"];
    }
    
    public function isRunning(): bool {
        return $this->data["state"] === "open";
    }
    
    public function getTheme(): string {
        return $this->data["theme"];
    }
    
    public function getSubmissions() {
        return $this->data["submissions"];
    }
    
    /**
     * Short-hand for creating this contest.
     */
    public function create() {
        Main::getInstance()->getContestManager()->addContest($this, $this->data);
    }
}
