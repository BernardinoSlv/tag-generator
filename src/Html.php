<?php

namespace BernardinoSlv\Solid;

class Html
{
    public function __call(string $name, array $arguments = [])
    {
        $className = "BernardinoSlv\\Solid\\Tag\\{$name}";

        $tag = (new ResolverHtmlTag)->resolver($className, $arguments);

        return $tag->render();
    }
}
