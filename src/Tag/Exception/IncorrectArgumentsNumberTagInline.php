<?php

namespace BernardinoSlv\Solid\Tag\Exception;

use Error;
use Exception;

class IncorrectArgumentsNumberTagInline extends Exception
{
    public function setDefaultMessage(): self
    {
        $this->message = 'Tags inline contem 1 único parâmetro, array $attributes';
        return $this;
    }
}
