<?php


// var_dump(file_exists("my.text"));
// print_r(scandir("."));
// unlink("my.text");
// rmdir("myname");


// pathinfo(".");
// $fileName = "myname.txt";

// if (file_exists($fileName)) {
//     touch($fileName);
// }

// $filestream = fopen($fileName, "r");
// echo fgetc($filestream, 15);

// touch("record.php");

// $fileName = "saveRecord.txt";

// if (file_exists($fileName)) {
//     touch($fileName);
// }
// $fileStream = fopen($fileName, "r");
// echo fread($fileStream, 1024);


$content = file_get_contents("http://forex.cbm.gov.mm/api/latest");
print_r(json_decode($content)->rates);



// fwrite($filestream, "Phyo");
// fwrite($filestream, " Thu");
// fwrite($filestream, " Kha");

// fclose($filestream);

// unlink($fileName); 
