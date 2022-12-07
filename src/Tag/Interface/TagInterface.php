<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid\Tag\Interface;

interface TagInterface
{
    /**
     * renderiza a tag
     *
     * @return string
     */
    public function render(): string;

    /**
     * Checa se é inline
     *
     * @return boolean
     */
    public function isInline(): bool;

    /**
     * Checa se é block
     *
     * @return boolean
     */
    public function isBlock(): bool;
}
