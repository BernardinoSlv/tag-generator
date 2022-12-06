<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid\Tag\Abstract;

use BernardinoSlv\Solid\Tag\Builder\TagBuilder;
use BernardinoSlv\Solid\Tag\Trait\TraitTagResolver;

/**
 * Classe abstrata para padronizar o construtor de tags que não são em bloco
 */
abstract class AbstractTagBlock extends AbstractTag
{
    use TraitTagResolver;

    public function __construct(string $inner, array $attributes = [])
    {
        $this->resolverTag(); //* resolve o attributo $tag;

        $this->tagBuilder = (new TagBuilder(false))
            ->setTag($this->tag)
            ->setInner($inner)
            ->setAttributes($attributes);
    }

    final public function isBlock(): bool
    {
        return true;
    }

    final public function isInline(): bool
    {
        return false;
    }
}
