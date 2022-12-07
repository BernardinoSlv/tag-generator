<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid;

use BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock;
use BernardinoSlv\Solid\Tag\Abstract\AbstractTagInline;
use BernardinoSlv\Solid\Tag\Exception\IncorrectArgumentsNumberTagBlock;
use BernardinoSlv\Solid\Tag\Exception\IncorrectArgumentsNumberTagInline;
use ReflectionClass;
use ReflectionMethod;

class ResolverHtmlTag
{
    /**
     * Resolve a classe
     *
     * @param string $className
     * @param array $arguments
     * @return AbstractTagInline|AbstractTagBlock
     */
    public function resolver(string $className, array $arguments): AbstractTagInline|AbstractTagBlock
    {
        if ($this->isValidNumberOfParameters($className, $arguments)) {
            if ($this->numberOfParameters($className) === 1) {
                return (new ReflectionClass($className))->newInstance($arguments[0]);
            } else {
                return (new ReflectionClass($className))->newInstance($arguments[0], $arguments[1]);
            }
        }
    }

    /**
     * Verifica se o número de parâmetro é válido para a tag
     *
     * @param string $className
     * @param array $arguments
     * @return boolean
     */
    protected function isValidNumberOfParameters(string $className, array $arguments): bool
    {
        if ($this->numberOfParameters($className) === count($arguments)) {
            return true;
        }
        $this->throwException($className);
    }

    /**
     * lança as exceções referente ao tipo de tag
     *
     * @param string $className
     * @return void
     */
    protected function throwException(string $className): void
    {
        if (is_subclass_of($className, AbstractTagBlock::class)) {
            throw (new IncorrectArgumentsNumberTagBlock())->setDefaultMessage();
        } else {
            throw (new IncorrectArgumentsNumberTagInline())->setDefaultMessage();
        }
    }

    /**
     * Obtem o número de parâmetros do construtor da classe
     *
     * @param string $className
     * @param array $arguments
     * @return boolean
     */
    protected function numberOfParameters(string $className): int
    {
        $numberOfParameters = (int) (new ReflectionMethod($className, "__construct"))->getNumberOfParameters();
        return $numberOfParameters;
    }
}
