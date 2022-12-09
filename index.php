<?php

use BernardinoSlv\Solid\Html;

require_once __DIR__ . "/vendor/autoload.php";

$html = new Html;

$link = $html->a("Link", [
    "href" => "https://www.bernardinoslv.com",
    "class" => "btn btn-sm btn-info"
]);

echo $link;
