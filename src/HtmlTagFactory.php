<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid;

use BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock;
use BernardinoSlv\Solid\Tag\Abstract\AbstractTagInline;

class HtmlTagFactory
{
    // é a fábrica de tags html 
    public static function get(string $className, array $arguments): AbstractTagInline|AbstractTagBlock
    {
    }
}
