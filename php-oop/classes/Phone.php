<?php

class Phone
{
    private $brand;
    private $model;

    function __construct()
    {
        echo "I am Contructor";
    }


    public function  dial()
    {
        return  $this->brand . " can make a call";
    }

    public function makeCall()
    {
        return $this->model . ' can make a call';
    }

    function __destruct()
    {
        echo "I am destructor";
    }
}
