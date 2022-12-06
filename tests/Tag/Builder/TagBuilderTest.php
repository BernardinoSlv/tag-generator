<?php

namespace BernardinoSlv\Solid\Tag\Builder;

use PHPUnit\Framework\TestCase;

class TagBuilderTest extends TestCase
{
    private ?TagBuilder $tagBuilder;

    protected function setUp(): void
    {
        $this->tagBuilder = new TagBuilder(false);
    }

    public function testSetterAndGetterAttributes()
    {
        $this->assertEmpty($this->tagBuilder->getAttributes());

        $this->assertInstanceOf(TagBuilder::class , $this->tagBuilder->setAttributes([
            "type" => "text"
        ]));
        $this->assertNotEmpty($this->tagBuilder->getAttributes());
        $this->assertEquals([
            "type" => "text"
        ], $this->tagBuilder->getAttributes());
    }

    public function testSetterAndGetterInner()
    {
        $this->assertNull($this->tagBuilder->getInner());
        $this->assertInstanceOf(TagBuilder::class, $this->tagBuilder->setInner("Texto aqui"));

        $this->assertEquals("Texto aqui", $this->tagBuilder->getInner());
        return $this->tagBuilder;
    }

    /**
     * @depends testSetterAndGetterInner
     *
     * @return void
     */
    public function testGetterAndSetterTag(TagBuilder $tagBuilder)
    {
        $this->assertNull($tagBuilder->getTag());
        $this->assertInstanceOf(TagBuilder::class, $tagBuilder->setTag("button"));
        $this->assertEquals("button", $tagBuilder->getTag());
        return $tagBuilder;
    }

    /**
     * @depends testGetterAndSetterTag
     *
     *
     * @return void
     */
    public function testGetResult(TagBuilder $tagBuilder)
    {
        $tagBuilder->setAttributes([
            "class" => "btn btn-info btn-sm",
            "id" => "button_test"
        ]);

        $tagBuilder->setInner("Enviar dados para teste");

        $this->assertEquals('<button class="btn btn-info btn-sm" id="button_test">Enviar dados para teste</button>'
            , $tagBuilder->getResult("button"));

        $tagBuilder->setTag("input");
        $tagBuilder->isInline = true;
        $this->assertEquals('<input class="btn btn-info btn-sm" id="button_test"/>', $tagBuilder->getResult("input"));
    }
}
