<?php

class ParentClass
{
    public $a;
    private $b;
    protected $c;

    function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }
}
