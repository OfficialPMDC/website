<?php

namespace pmdc\data\contest;

use pmdc\entity\Contest;

class ContestDataManager {
    private $contests = [];

    public function init() {
        @mkdir(DATA_PATH);
        @mkdir(DATA_PATH . "/contests/");
        $this->load();
    }
    
    private function load() {
        $directory = DATA_PATH . "/contests/";
        foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory)) as $file => $contests) {
            if(is_file($file) && pathinfo($file)[$extension] === "json") {
                $contests = json_decode(file_get_contents($contests), true);
                $contest = new Contest($contests);
                $this->contests[$contest->getId()] = $contest;
            }
        }
    }
    
    public function getContest($id) {
        foreach($this->contests as $contest) {
            if($contest->getId() === $id) {
                return $contest;
            }
        }
    }
    
    /**
     * Creates a new contest.
     *
     * @param Contest $contest
     * @param array   $data
     */
    public function addContest(Contest $contest, array $data) {
        file_put_contents(DATA_PATH . "/" . $contest->getId() . ".json" . json_encode($data));
        $this->contests[$contest->getId()] = $contest;
    }
}
