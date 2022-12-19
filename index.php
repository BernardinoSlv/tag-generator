<?php

use BernardinoSlv\Solid\Html;

require_once __DIR__ . "/vendor/autoload.php";

$html = new Html;

$img = $html->img([
    "src" => "https://www.bernardinoslv.com/image.png",
    "title" => "Imagem do meu site",
    "width" => "100px"
]);

echo $img;
