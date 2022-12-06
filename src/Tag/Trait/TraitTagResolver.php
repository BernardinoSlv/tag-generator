<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid\Tag\Trait;

use ReflectionClass;
use ReflectionProperty;

trait TraitTagResolver
{
    /**
     * Resolve automaticamente o nome da tag, caso a propriedade tag não esteja explicitamente definida
     *
     * @return string
     */
    protected function resolverTag(): string
    {
        $reflection = new ReflectionClass($this);

        //* Verificando se há a propriedade tag, e se ela não está vazia
        if (
            $reflection->hasProperty("tag")
            && !empty($reflection->getProperty("tag"))
        ) {
            return $reflection->tag;
        }

        $classNameExploded = explode("\\", $reflection->getName());
        $propertyName = array_pop($classNameExploded);
        $this->tag = strtolower($propertyName);
        $tagPropertyReflection = new ReflectionProperty($this, "tag");
        $tagPropertyReflection->setAccessible(false);
        return $this->tag;
    }
}
