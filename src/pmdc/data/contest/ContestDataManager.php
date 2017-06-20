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
            $contests = json_decode(file_get_contents($contests), true);
            if(is_array($contests)) {
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
    
    public function getContests(): array {
        return $this->contests;
    }
    
    /**
     * Creates a new contest.
     *
     * @param Contest $contest
     * @param array   $data
     */
    public function addContest(Contest $contest, array $data) {
        file_put_contents(DATA_PATH . "/contests/" . $contest->getId() . ".json", json_encode($data));
        $this->contests[$contest->getId()] = $contest;
    }
}
