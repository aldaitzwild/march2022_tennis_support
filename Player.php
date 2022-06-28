<?php

class Player 
{
    public string $points = "";
    public int $games = 0 ;
    public int $sets = 0;
    public bool $advantage = false;

    public function addPoint(Player $opponent) {
        if($this->points == "") {
            $this->points = "15";
        } else if ($this->points == "15") {
            $this->points = "30";
        } else if ($this->points == "30") {
            $this->points = "40";
        } else if ($this->points == "40") {
            if ($opponent->advantage)
            {
                $opponent->advantage = false;
                return;
            }
            if ($opponent->points == "40" && $this->advantage == false) {
                $this->advantage = true;
                return;
            }
            $this->points = "";
            $this->games++;
            $this->advantage = false;

            $opponent->points = "";
        }
    }

    public function addGame(Player $opponent) {

    }

    public function addSet(Player $opponent) {

    }
}