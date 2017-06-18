<?php

namespace pmdc\views;

use pmdc\Main;

class HomePageView {
    private $metrics;

    public function __construct(Main $metrics) {
        $this->metrics = $metrics;
    }
    
    public function getTitle(): string {
        return "PocketMine Development Contest by TheDiamondYT";
    }
    
    public function init() {
        require_once INSTALL_PATH . "/includes/header.php";
        ?>
        <div class="jumbotron jumbotron-fluid mb-xl">
            <div class="container">
                <h1>PocketMine Development Contest</h1>

                <p>Welcome to the fortnightly PocketMine Plugin Development Contest! Click "Learn more" for more information.</p>

                <p><a class="btn btn-info btn-lg" href="index.php?page=about">Learn more</a></p>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">What is PMDC?</h4>
                    <p class="card-text">PMDC is a plugin development competition for the PocketMine-MP server software. The aim is for developers to create a project from scratch in a limited time, and then share that with the community and more importantly, the judges.</p>
                    <p class="card-text">The whole point of this is to give back to the wonderful community of Minecraft: Pocket Edition. Oh, and did i mention there would be prizes for the winners? See the "Learn more" page.</p>
                </div>
            </div>
            <br>
        </div>
        <?
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
