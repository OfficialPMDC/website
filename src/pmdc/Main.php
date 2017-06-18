<?php

namespace pmdc;

use pmdc\data\contest\ContestDataManager;
use pmdc\views\AboutPageView;
use pmdc\views\HomePageView;

class Main {
    public static $instance;
    
    /** @var ContestDataManager */
    private $contestManager;
    
    public static function getInstance() {
        return self::$instance;
    }

    public static function init() {
        (new Main)->start();
    }
    
    public function start() {
        self::$instance = $this;
        
        $this->contestManager = new ContestDataManager();
        $this->contestManager->init();
        
        if(empty($_GET)) {
            $home = new HomePageView($this);
            $home->init();
        }
        
        switch($_GET["page"]) {
           case "about":
               $about = new AboutPageView($this);
               $about->init();
               break;
        }
    }
    
    public function getContestManager() {
        return $this->ContestManager;
    }
}
