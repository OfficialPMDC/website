<?php

namespace pmdc;

if(!defined("DATA_PATH")) {
    define("DATA_PATH", INSTALL_PATH . "/data");
}

foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(INSTALL_PATH . "/src/pmdc/")) as $file) {
    if(is_file($file)) {
        require_once $file;
    }
}
