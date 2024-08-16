<?php

class Person
{
    public $name;
    public $age;
    public $gender;

    function __construct($inputName, $inputAge, $inputGender)
    {
        $this->name = $inputName;
        $this->age = $inputAge;
        $this->gender = $inputGender;
    }

    public function speak($lang = "English")
    {
        return $this->name . ' can speak ' . $lang . 'language';
    }

    public function learn($what)
    {
        return $this->name . ' can learn ' . $what;
    }

    function __destruct() {}
}
