<?php

namespace pmdc\views;

use pmdc\Main;

class EnterPageView {
    private $main;

    public function __construct(Main $main) {
        $this->main = $main;
    }
    
    public function getTitle(): string {
        return "Enter Contest // PocketMine Development Contest";
    }
    
    public function init() {  
        require_once INSTALL_PATH . "/includes/header.php";
        ?>
        <div class="jumbotron jumbotron-fluid mb-xl">
            <div class="container">
                <h1>Enter contest</h1>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Step 1</h4>
                    <p class="card-text"><strong>Define your project info</strong></p>
                    <p class="card-text">Firstly, you need to tell us your project information! We aren't mind readers.</p>
                    <a class="btn btn-secondary" id="project-info" style="float: right" href="javascript:void(0)">Tell us</a>
                    <header>
                        <? if(isset($_POST["project-name"])) {
                               $projectName = $_POST["project-name"];
                               $projectReadme = $_POST["project-readme"] ?? "";
                               
                               echo "<h5>Done</h5>";
                           }
                        ?>
                    </header>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Step 2</h4>
                    <p class="card-text"><strong>Create your project repo</strong></p>
                    <p class="card-text">Secondly, we need to create a repo for your submission on your GitHub account. We will also create a repo for you on our GitHub, which will house all your future submissions.</p>
                    <a class="btn btn-secondary" id="project-repo" style="float: right" href="#">Do it</a>
                    <header>
                        <? if(isset($_POST["repo-name"])) {
                               $repoName = $_POST["repo-name"];
                            
                               echo "<h5>Done</h5>";
                           }
                        ?>
                    </header>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">Step 3</h4>
                    <p class="card-text"><strong>Write your code</strong></p>
                    <p class="card-text">Finally, just click "Submit" and write your code! Don't forget to follow the rules.</p>
                    </p>
                </div>
            </div><br>
            <a class="btn btn-info" id="submit-project" style="float: right" href="javascript:void(0)">Submit</a>
            <br>
        <?
        // Modals
        require_once INSTALL_PATH . "/includes/modal/projectinfo.php";
        require_once INSTALL_PATH . "/includes/modal/projectrepo.php";
        
        require_once INSTALL_PATH . "/includes/footer.php";
    }
}
