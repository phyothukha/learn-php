<?php

//encapsulation concept 
class BankAccount
{
    private $balanceHolder;
    private $balance = 0;


    //Encapsuation method
    function __construct($name, $initialDeposit)
    {
        $this->balanceHolder = $name;
        $this->balance += $initialDeposit;
    }


    public function checkBalance()
    {
        return $this->balanceHolder . ' have ' . $this->balance . " kyats";
    }
    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function onlineDeposit($where, $amount)
    {
        $this->balance += $amount;
        echo $this->balanceHolder . " deposited " . $amount . " from " . $where;
    }

    public function  withDraw($amount)
    {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
        }
    }
    public function transfer($to, $amount)
    {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            echo $this->balanceHolder . " transferred " . $amount . " to " . $to;
        }
    }
}
