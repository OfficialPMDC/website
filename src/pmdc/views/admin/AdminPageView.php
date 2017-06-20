<?php

namespace pmdc\views\admin;

use pmdc\Main;

class AdminPageView {
    private $main;

    public function __construct(Main $main) {
        $this->main = $main;
    }
    
    public function getTitle(): string {
        return "Admin CP // PocketMine Development Contest";
    }
    
    public function init() {
        require_once INSTALL_PATH . "/includes/header.php";
        ?>
        <div class="jumbotron jumbotron-fluid mb-xl">
            <div class="container">
                <h1>Admin CP</h1>
            </div>
        </div>
        <div class="container">
            <h3>Contest options</h3><hr>
            <a class="btn btn-info" href="index.php?page=admin&action=create-contest">Create new contest</a>
            <br><br><br>
            <h3>Site options</h3><hr>
            <button class="btn btn-danger">Backup</button>
            <br><br>
        </div>
        <?
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
