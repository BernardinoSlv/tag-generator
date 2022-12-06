<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid\Tag\Abstract;

use BernardinoSlv\Solid\Tag\Builder\TagBuilder;
use BernardinoSlv\Solid\Tag\Trait\TraitTagResolver;

/**
 * Uma abstração de uma tag inline, definindo seu construtor padronizado para tags que serão inline
 */
abstract class AbstractTagInline extends AbstractTag
{
    use TraitTagResolver;

    final public function __construct(array $attributes = [])
    {
        $this->resolverTag(); //* resolve o attributo $tag

        $this->tagBuilder = (new TagBuilder(true))
            ->setTag($this->tag)
            ->setAttributes($attributes);
    }

    final public function isInline(): bool
    {
        return true;
    }

    final public function isBlock(): bool
    {
        return false;
    }
}
