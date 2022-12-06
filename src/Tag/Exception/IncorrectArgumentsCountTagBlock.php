<?php

namespace BernardinoSlv\Solid\Tag\Exception;

use Error;
use Exception;

class IncorrectArgumentsCountTagBlock extends Exception
{
    public function setDefaultMessage()
    {
        $this->message = 'Tags block contem 2 parâmentros, string $inner, array $attributes';
    }
}
