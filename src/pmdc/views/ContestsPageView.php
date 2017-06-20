<?php

namespace pmdc\views;

use pmdc\Main;

class ContestsPageView {
    private $main;

    public function __construct(Main $main) {
        $this->main = $main;
    }
    
    public function getTitle(): string {
        return "Contests // PocketMine Development Contest";
    }
    
    public function init() {
        require_once INSTALL_PATH . "/includes/header.php";
        ?>
        <div class="jumbotron jumbotron-fluid mb-xl">
            <div class="container">
                <h1>Contests</h1>
            </div>
        </div>
        <div class="container">
        <? foreach(Main::getInstance()->getContestManager()->getContests() as $contest) { ?>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"> <?= $contest->getName() ?> </h4>
                    <p class="card-text"> <?= $contest->getShortDescription() ?> </p>
                    <header>
                        <hr>
                        <h5>Status: <?= $contest->isRunning() ? "Running" : "Finished" ?> </h5>
                        <a class="btn btn-secondary" style="float: right" href="index.php?page=contest&id=<?= $contest->getId() ?>">More info</a>
                    </header>
                </div>
            </div>
            <br>
        <? } ?>
        </div>
        <?
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
