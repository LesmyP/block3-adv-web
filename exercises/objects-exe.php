<?php
//// Displaying errors
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class LedLight
{
    private $isOn = false;
    private $selectedColor = 0;
    private $selectedBrightness = 0;

    public function __construct() {
        // The constructor can be empty if there are no initializations needed.
    }

    public function pushPowerButton() {
        $this->isOn = !$this->isOn;
    }
 

    public function selectBrightness() {
        if ($this->isOn) {
            $this->selectedBrightness = ($this->selectedBrightness + 1) % 3;
        }
    }

    public function selectColor() {
        if ($this->isOn) {
            $this->selectedColor = ($this->selectedColor + 1) % 3;
        }
    }

    private function generateCurrentState() {
        $status = $this->isOn ? 'ON' : 'OFF';
        $colors = ['White', 'Warm White', 'Blue'];
        $brightness = ['Low', 'Medium', 'High'];

        return "Power: $status, Color: {$colors[$this->selectedColor]}, Brightness: {$brightness[$this->selectedBrightness]}";
    }
}




?>