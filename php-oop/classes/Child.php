<?php

class Child extends ParentClass
{

    public $d;
    public $e;

    function __construct($a, $b, $c, $d, $e)
    {
        parent::__construct($a, $b, $c);
        $this->d = $d;
        $this->e = $e;
    }
}
