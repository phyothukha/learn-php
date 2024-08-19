<?php

class A
{

    public $z;

    function __construct($z)
    {
        $this->z = $z;
    }

    public function a()
    {
        return "this is a method";
    }
}

class B extends A
{
    public $zz;
    function __construct($z, $zz)
    {
        $this->z = $z;
        $this->zz = $zz;
    }
    public function a()
    {
        return "This is a method from B class";
    }
}


$a = new B("z", "zz");
echo $a->a();
