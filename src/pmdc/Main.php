<?php

namespace pmdc;

use pmdc\data\contest\ContestDataManager;
use pmdc\views\AboutPageView;
use pmdc\views\admin\AdminPageView;
use pmdc\views\admin\CreateContestPageView;
use pmdc\views\ContestInfoPageView;
use pmdc\views\ContestsPageView;
use pmdc\views\EnterPageView;
use pmdc\views\HomePageView;
use pmdc\views\LoginPageView;

use pmdc\utils\SessionUtils;

use pmdc\api\v1\SiteAPI;

class Main { 
    public static $ACCESS;
    public static $CLIENT_ID;
    
    public static $instance;
    
    /** @var ContestDataManager */
    private $contestManager;
    
    public static function getInstance() {
        return self::$instance;
    }

    public static function init() {
        (new self)->start();
    }
    
    public function start() {
        self::$instance = $this;
        
        self::$CLIENT_ID = str_replace('"', "", base64_decode("ImVhZjI3NGFhNzJiMDY4ZDI2YjQzIg=="));
        self::$ACCESS = str_replace('"', "", base64_decode("VGhlRGlhbW9uZFlUMQ=="));
        
        $this->contestManager = new ContestDataManager();
        $this->contestManager->init();
        
        (new SessionUtils())->init();
        
        if(empty($_GET)) {
            $home = new HomePageView($this);
            $home->init();
        }
        
        switch($_GET["page"]) {
           case "about":
               $about = new AboutPageView($this);
               $about->init();
               break;
           case "contests":
               $contests = new ContestsPageView($this);
               $contests->init();
               break;
           case "contest":
               if(isset($_GET["id"])) {
                   $contest = new ContestInfoPageView($this);
                   $contest->init($_GET["id"]);
                   return;
               }
               echo "unknown contest";
               break;
           case "enter":
               $enter = new EnterPageView($this);
               $enter->init();
               break;
           case "login":
               $login = new LoginPageView($this);
               $login->init();
               break;       
           case "admin": 
               if(!isset($_GET["action"])) {
                   $admin = new AdminPageView($this);
                   $admin->init();
                   return;
               }
               switch($_GET["action"]) {
                   case "create-contest":
                       $contest = new CreateContestPageView($this);
                       $contest->init();
                       break;
               }
               break;
           case "api":
               $api = new SiteAPI();
               $api->init();
               break;
        }
    }
    
    public static function getSecret($key) {
        $file = yaml_parse_file(INSTALL_PATH . "/config.yml");
        return $file[$key];
    }
    
    public function getContestManager() {
        return $this->contestManager;
    }
}
