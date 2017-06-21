<?php

namespace pmdc\api\v1;

use pmdc\entity\Contest;
use pmdc\entity\Submission;
use pmdc\utils\CurlUtils;
use pmdc\utils\SessionUtils;
use pmdc\Main;

class SiteAPI {

    public static function init() {
        if(!isset($_GET["action"])) {
            return;
        }
        
        $session = SessionUtils::getInstance();
        
        switch($_GET["action"]) {
            case "authenticate":
                $code = $_GET["code"];
                $result = CurlUtils::post("https://github.com/login/oauth/access_token", [
                    "client_id" => Main::$CLIENT_ID,
                    "client_secret" => Main::getSecret("client.secret"),
                    "code" => $code
                ], "Accept: application/json");
                
                if($result === false) {
                    echo "Error while authenticating. Please report.";
                    return;
                }
                
                $session->accessToken = json_decode($result, true)["access_token"];
                
                $data = json_decode(CurlUtils::ghApiGet("/user", $session->accessToken), true);
                
                $session->name = $_SESSIONdata["name"];
                $session->username = $data["login"];
                $session->avatar = $data["avatar-url"];
                $session->update();
                break;
            case "create-contest":
                if(!$session->isAuthenticated() or $session->username !== Main::ACCESS) {
                    //return;
                }
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
            case "submit-project":
                if(!$session->isAuthenticated()) {
                    echo "please login";
                    //return;
                }
                $project = new Submission([
                    "name" => $_POST["project-name"],
                    "creator" => "todo: name",
                    "contest" => 6 // TODO: customizable
                ]);
                $project->submit();
                break;
            default:
                echo "Invalid action";
                break;
        }
    }
}
