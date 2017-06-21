<?php

namespace pmdc\views;

use pmdc\Main;

class LoginPageView {
    private $main;

    public function __construct(Main $main) {
        $this->main = $main;
    }
    
    public function getTitle(): string {
        return "Login // PocketMine Development Contest";
    }
    
    public function init() {
        require_once INSTALL_PATH . "/includes/header.php";
        ?>
        <div class="jumbotron jumbotron-fluid mb-xl">
            <div class="container">
                <h1>Redirecting to GitHub...</h1>
                <script>
                setTimeout(function() {
                    window.location.href = "https://github.com/login/oauth/authorize?scope=user:email,repo&client_id=<?= Main::$CLIENT_ID ?>";
                }, 1000);
                </script>
            </div>
        </div>
        <?
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
