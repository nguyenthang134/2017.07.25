<?php
/**
 * Created by PhpStorm.
 * User: thang
 * Date: 7/25/17
 * Time: 1:52 PM
 */
interface IBehaviour{
    public function moveCommand();
}

class AgressiveBehaviour implements IBehaviour{
    public function moveCommand()
    {
        echo "Kill him";
    }
}

class DefendBehaviour implements IBehaviour{
    public function moveCommand()
    {
        echo "RUNNN";
    }
}

class NormalBehaviour implements IBehaviour{
    public function moveCommand()
    {
        echo "Ignore him";
    }
}

class Robot{
    private $strategy = NULL;
    public $name;

    function __construct($name, $behavior)
    {
        $this->name = $name;
        switch($behavior){
            case "agressive":
                $this-> strategy = new AgressiveBehaviour();
                break;
            case "defend":
                $this-> strategy = new DefendBehaviour();
                break;
            case "normal":
                $this-> strategy = new NormalBehaviour();
                break;
        }
    }

    public function showRobotBehaviour(){
        return $this -> strategy -> moveCommand();
    }
}

$angryRobot = new Robot("Angry", "agressive");
echo "<br/>Robot " .$angryRobot -> name . ": ";
echo $angryRobot -> showRobotBehaviour();



$defensiveRobot = new Robot("Shy", "defend");
echo "<br/>Robot " .$defensiveRobot -> name . ": ";
echo $defensiveRobot -> showRobotBehaviour();