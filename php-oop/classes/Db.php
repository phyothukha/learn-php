<?php

class Db
{
    private $conn;

    function __construct()
    {
        $serverName = "localhost";
        $userName = "ptk";
        $password = "21934576";
        $databaseName = "phyrous_students";

        $this->conn = new mysqli($serverName, $userName, $password, $databaseName);
    }
    public function first($sql)
    {
        $query = $this->conn->query($sql);
        $row = $query->fetch_object();
        return $row;
    }

    public function fetchAll($sql)
    {
        $query = $this->conn->query($sql);
        $rows = [];
        while ($row = $query->fetch_object()) {
            $rows[] = $row;
        }
        return $rows;
    }


    function __destruct()
    {
        $this->conn->close();
    }
}
