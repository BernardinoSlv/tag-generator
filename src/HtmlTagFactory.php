<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid;

use BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock;
use BernardinoSlv\Solid\Tag\Abstract\AbstractTagInline;


class HtmlTagFactory
{
    public static function get(string $className, array $arguments): AbstractTagInline|AbstractTagBlock
    {
        return (new ResolverHtmlTag)->resolver($className, $arguments);
    }
}
