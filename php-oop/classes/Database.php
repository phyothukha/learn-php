<?php

class Database
{
    protected $conn;

    function __construct()
    {
        $serverName = "localhost";
        $userName = "ptk";
        $password = "21934576";
        $databaseName = "phyrous_students";

        $this->conn = new mysqli($serverName, $userName, $password, $databaseName);
    }


    function __destruct()
    {
        $this->conn->close();
    }
}
