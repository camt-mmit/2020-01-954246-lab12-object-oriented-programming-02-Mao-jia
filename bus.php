<?php
require_once './Car.php';

class bus extends Car
{
    private $passenger;
    private $fuel;
    public $capacity;
    function __construct($owner, $pistonv,$capacity)
    {
        parent::__construct($owner, $pistonv);
        $this->passenger = 0;
        $this->fuel = 0;
        $this->capacity=$capacity;
    }

    function runFor($km)
    {
        $result = parent::runFor($km);
        if($result) {
            $this->fuel += ($km / 120) * ($this->pistonVolume() / 1000) + (70*($this->passenger * $km) / 10000);
        }

        return $result;
    }

    function fuelUsed()
    {
        return $this->fuel;
    }

    function showLongInfo()
    {
        $result = parent::showLongInfo();
        if($result) {
            printf("Current passenger:     %10s \n",
                number_format($this->passenger, 0));
        }

        return $result;
    }

    function load($number)
    {
        if ((($this->passenger) + $number)> $this->capacity){
            printf("Number of passengers greater than capacity!!!\n");
            return false;
        }
        $this->passenger += $number;
        return true;
    }
    function unload($number)
    {
        if((($this->passenger) - $number)<0){
            printf("Number of passengers less than 0!!!\n");
            return false;
        }
        $this->passenger-=$number;
        return true;
    }
}
