<?php

namespace pmdc\views\admin;

use pmdc\Main;

class CreateContestPageView {
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
            <h3>Create contest</h3>
            <br>
            <form action="index.php?page=api&action=create-contest" method="post">
                <div class="form-group">
                    <label for="contest-name">Name</label>
                    <input type="text" class="form-control" name="contest-name" id="contest-name">
                </div>
                <div class="form-group">
                    <label for="contest-id">ID</label>
                    <input type="text" class="form-control" name="contest-id" id="contest-id">
                </div>
                <div class="form-group">
                    <label for="contest-short-description">Short description</label>
                    <input type="text" class="form-control" name="contest-short-description" id="contest-short-description">
                </div>
                <div class="form-group">
                    <label for"contest-description">Description</label>
                    <textarea type="text" class="form-control" name="contest-description" id="contest-description"></textarea>
                </div>
                <div class="form-group">
                    <label for="contest-theme">Theme</label>
                    <input type="text" class="form-control" name="contest-theme" id="contest-theme">
                </div>
                <div class="form-group">
                    <label for="contest-rules">Rules</label>
                    <textarea type="text" class="form-control" name="contest-rules" id="contest-rules"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
            <br>
        </div>
        <?
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
