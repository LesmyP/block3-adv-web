<?php
//// Displaying errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class LedLight
{
    public $power; 
    public $color;
    public $brightness;

}

$classroomLight = New LedLight();
$classroomLight->power = "on";

echo $classroomLight->power;


?>