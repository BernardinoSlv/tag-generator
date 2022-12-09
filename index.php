<?php

use BernardinoSlv\Solid\Html;

require_once __DIR__ . "/vendor/autoload.php";

$html = new Html;

$link = $html->a("Meu site", [
    "href" => "https://bernardinoslv.com"
]);

echo $link;

echo 
