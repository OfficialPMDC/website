<?php

namespace pmdc\views;

use pmdc\Main;

class AboutPageView {
    private $main;

    public function __construct(Main $main) {
        $this->main = $main;
    }
    
    public function getTitle(): string {
        return "About // PocketMine Development Contest";
    }
    
    public function init() {
        require_once INSTALL_PATH . "/includes/header.php";
        ?>
        <div class="jumbotron jumbotron-fluid mb-xl">
            <div class="container">
                <h1>About</h1>
            </div>
        </div>
        <div class="container">
            <br>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Background</h4>
                    <p class="card-text">I originally came up with this idea a few days ago, and i was inspired by <a href="http://devathon.org">devathon.org</a>. It is an awesome idea and it hasn't been done in the Minecraft: Pocket Edition community yet. So i thought to myself, 'why not do it!?'. And i did.</p>
                    <p class="card-text">The contest is also loosly based off of the <a href="https://www.reddit.com/r/MCPE/comments/6gm3o1/fortnightly_building_challenge_11_june_25_june/">Fortnightly Building Challenge</a> over on /r/mcpe. I originally thought of just creating a reddit post like FBC, but i decided against it.</p>
                    <p class="card-text">The code structure of this site is based off of <a href="http://poggit.pmmp.io">Poggit</a>, an amazing plugin repository created by the devs @ PocketMine.</p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Rewards</h4>
                    <p class="card-text">All contestents will receive an award. It won't be much at all, but the point of this contest is not personal gain — it's to give back to the community. I hope to partner with some people and then the winners can receive better awards, but we'll see.</p>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Organizers</h4>
                    <p class="card-text">I would like to thank the following people for making this possible:</p>
                    <p class="card-text"><li><a href="#">Luke (TheDiamondYT)</a> - The one who wrote everything</li></p>
                </div>
            </div>
            <br>
        </div>
        <?
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
