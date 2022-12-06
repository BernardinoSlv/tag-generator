<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid\Tag\Builder;

/**
 * Responsível por contruir uma tag
 */
final class TagBuilder
{
    private ?string $tag = null;
    private ?string $inner = null;
    private array $attributes = [];
    public bool $isInline = false;

    public function __construct($isInline = false)
    {
        $this->isInline = $isInline;
    }

    /**
     * Defini a tag
     *
     * @param string $tag
     * @return TagBuilder
     */
    public function setTag(string $tag): TagBuilder
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Obtem a tag definida
     *
     * @return string
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * Seta o inner
     *
     * @param string $content
     * @return TagBuilder
     */
    public function setInner(string $content): TagBuilder
    {
        $this->inner = $content;
        return $this;
    }

    /**
     * Obtem o valor do inner
     *
     * @return string
     */
    public function getInner(): ?string
    {
        return $this->inner;
    }

    /**
     * Seta os attributos
     *
     * @param array $attributes
     * @return TagBuilder
     */
    public function setAttributes(array $attributes): TagBuilder
    {
        $this->attributes = $attributes;
        ksort($this->attributes);
        return $this;
    }

    /**
     * Obtem os attributos
     *
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Irá construir a tag e retorna-la
     *
     * @return string
     */
    public function getResult(): string
    {
        $parsedAttributes = $this->parsedAttributes();
        return $this->closeTag($parsedAttributes);
    }

    /**
     * Passa o array de attributos em string
     *
     * @return string
     */
    private function parsedAttributes(): string
    {
        $parsedArrayToArrayString = [];

        foreach ($this->attributes as $key => $value) {
            $parsedArrayToArrayString[] = $key . '="' . $value .'"';
        }
        return implode(" ", $parsedArrayToArrayString);
    }

    /**
     * Finaliza a tag, fazendo o fechamento já adicionando os attributos
     *
     * @param string $parsedAttributes
     * @return string
     */
    private function closeTag(string $parsedAttributes): string
    {

        $finalElement = "<{$this->tag} {$parsedAttributes}";
        if (!strlen(trim($parsedAttributes))) {
            $finalElement = substr($finalElement, 0, -1);
        }

        if ($this->isInline) {
            $finalElement .= "/>";
        } else {
            $finalElement .= ">{$this->inner}</{$this->tag}>";
        }
        return $finalElement;
    }
}
