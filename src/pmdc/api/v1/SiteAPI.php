<?php

namespace pmdc\api\v1;

use pmdc\entity\Contest;

class SiteAPI {

    public static function init() {
        if(!isset($_GET["action"])) {
            echo "This api is not intended for outside use";
            return;
        }

        switch($_GET["action"]) {
            case "authenticate":
                echo "todo";
                break;
            case "create-contest":
                $contest = new Contest([
                    "id" => $_POST["contest-id"],
                    "name" => $_POST["contest-name"],
                    "short-description" => $_POST["contest-short-description"],
                    "description" => $_POST["contest-description"],
                    "state" => "open",
                    "theme" => $_POST["contest-theme"],
                    "rules" => $_POST["contest-rules"]
                ]);
                $contest->create();
                
                echo "done";
                break;
            default:
                echo "Invalid action";
                break;
        }
    }
}
