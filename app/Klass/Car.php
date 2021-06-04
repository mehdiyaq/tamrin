<?php


namespace App\Klass;


class Car implements CarInterface
{



    public function getModel($car)
    {
        return "The Car model is " . $car;
    }
}
