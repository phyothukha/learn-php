<?php

$x= false;

echo $x;
echo md5("asdfsdfa");

echo "<br/>";

echo password_hash("ptk21934576",PASSWORD_BCRYPT);
echo "<br/>";
echo "<br/>";

echo password_hash("ptk21934576",PASSWORD_DEFAULT);
echo "<br/>";
echo "<br/>";

echo password_hash("ptk21934576",PASSWORD_DEFAULT);
echo "<br/>";
echo "<br/>";

// echo "<script> alert('You are hacked')</script>";
echo htmlentities("I am Phyo Thu Kha");
echo htmlentities("I'am Phyo Thu \" Kha");
echo htmlspecialchars("I'am Phyo Thu \" Kha");
// $jsScript= htmlentities("<script>alert('You are hacked')</script>");
// echo html_entity_decode($jsScript);



