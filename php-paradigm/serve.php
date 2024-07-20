
<?php

$port = 8090;

$startingPoint = __DIR__ . "/public";
exec("php -S localhost:$port -t  $startingPoint");
