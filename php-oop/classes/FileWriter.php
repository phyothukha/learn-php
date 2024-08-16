<?php

class FileWriter
{
    private $fileHandle;
    function __construct($fileName)
    {

        $this->fileHandle = fopen($fileName, "a+") or die("Unable to file read");
    }

    public function fwrite(String $content)
    {
        fwrite($this->fileHandle, $content);
    }
    function __destruct()
    {
        fclose($this->fileHandle);
    }
}
