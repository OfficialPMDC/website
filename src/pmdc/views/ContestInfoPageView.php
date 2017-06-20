<?php

namespace pmdc\views;

use pmdc\Main;

class ContestInfoPageView {
    private $main;
    private $contestName;

    public function __construct(Main $main) {
        $this->main = $main;
    }
    
    public function getTitle(): string {
        return $this->contestName . " // PocketMine Development Contest";
    }
    
    public function init(int $id) {  
        $contest = Main::getInstance()->getContestManager()->getContest($id);
        if($contest === null) {
            echo "unknown contest";
            return;
        }
        
        $this->contestName = $contest->getName();
        
        require_once INSTALL_PATH . "/includes/header.php";
        ?>
        <div class="jumbotron jumbotron-fluid mb-xl">
            <div class="container">
                <h1> <?= $contest->getName() ?> </h1>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">About</h4>
                    <p class="card-text"> <?= $contest->getDescription() ?> </p>
                </div>
            </div>
            <br>
            <div class="card-block">
                <h4 class="card-title">Rules</h4>
                <p class="card-text"> <?= $contest->getRules() ?> </p>
            </div>
        </div>
        <?
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
