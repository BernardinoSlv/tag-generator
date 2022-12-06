<?php

namespace BernardinoSlv\Solid;

class Html
{
    public function __call(string $name, array $arguments = [])
    {
        $className = "BernardinoSlv\\Solid\\Tag\\{$name}";

        if (count($arguments) === 1) {
            $tag = new $className($arguments[0]);
            $attributes = $arguments[0];
        } else {
            $tag = new $className($arguments[0], $arguments[1]);
            $attributes = $arguments[1];
        }

        return $tag->render();
    }
}
