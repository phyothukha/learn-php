<?php

trait File
{
    public function file()
    {
        return "data from post method with file";
    }

    public function files()
    {
        return "data from post method with files";
    }

    public function save()
    {
        return "save file from post method";
    }
}
