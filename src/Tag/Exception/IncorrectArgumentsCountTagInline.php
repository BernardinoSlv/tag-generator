<?php

namespace BernardinoSlv\Solid\Tag\Exception;

use Error;
use Exception;

class IncorrectArgumentsCountTagInline extends Exception
{
    public function setDefaultMessage()
    {
        $this->message = 'Tags inline contem 1 único parâmetro, array $attributes';
    }
}
