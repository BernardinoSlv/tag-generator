<?php

namespace BernardinoSlv\Solid\Tag\Exception;

use Error;
use Exception;

class IncorrectArgumentsNumberTagBlock extends Exception
{
    public function setDefaultMessage(): self
    {
        $this->message = 'Tags block contem 2 parâmentros, string $inner, array $attributes';
        return $this;
    }
}
