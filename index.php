<?php

namespace {
    if(!defined("INSTALL_PATH")) {
        define("INSTALL_PATH", realpath(__DIR__));
    }
}

namespace pmdc {
    require_once __DIR__ . "/src/load.php";

    $extensions = [
        "json" => "JSON"
    ];
    
    foreach($extensions as $ext => $name) {
        if(!extension_loaded($ext)) {
            echo "Unable to find the required $name ($ext) extension.";
            exit(1);
        }
    }
    
    try {
        Main::init();
    } catch (\Throwable $ex) {
        echo $ex->getMessage();
    }
}
