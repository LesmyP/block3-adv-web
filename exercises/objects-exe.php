<?php
//// Displaying errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class LedLights
{
    public $power; 
    public $color;
    public $brightness;

}

$powerButton = New TurnOnOff();

public function TurnOnOff()
{
    $this->power = true;
    echo "Turning on";
}

public function TurnOff()
{
    $this->power = false;
    echo "Turning off";
}





?>