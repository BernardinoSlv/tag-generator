<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid\Tag\Abstract;

use BernardinoSlv\Solid\Tag\Builder\TagBuilder;
use BernardinoSlv\Solid\Tag\Interface\TagInterface;


abstract class AbstractTag implements TagInterface
{
    protected ?TagBuilder $tagBuilder = null;

    final public function render(): string
    {
        return $this->tagBuilder
            ->getResult($this->tag);
    }


    public function getTag(): string
    {
        return $this->tag;
    }

    public function __toString()
    {
        return $this->tag;
    }
}
