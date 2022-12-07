<?php

namespace BernardinoSlv\Solid;

use BernardinoSlv\Solid\Tag\A;
use BernardinoSlv\Solid\Tag\Exception\IncorrectArgumentsNumberTagBlock;
use BernardinoSlv\Solid\Tag\Exception\IncorrectArgumentsNumberTagInline;
use BernardinoSlv\Solid\Tag\Img;
use BernardinoSlv\Solid\Tag\Interface\TagInterface;
use PHPUnit\Framework\TestCase;

class ResolverHtmlTagTest extends TestCase
{
    private ?ResolverHtmlTag $resolverHtmlTag = null;

    protected function setUp(): void
    {
        $this->resolverHtmlTag = new ResolverHtmlTag();
    }


    public function testTagImgIsInstanceOfImg()
    {
        $img = $this->resolverHtmlTag->resolver(Img::class, [
            [
                "src" => "https:://google.com/icon.png"
            ]
        ]);

        $this->assertInstanceOf(Img::class, $img);
        return $img;
    }

    public function testTagImgExceptionIncorrectArgumentsNumberTagInline()
    {
        $this->expectException(IncorrectArgumentsNumberTagInline::class);
        $img = $this->resolverHtmlTag->resolver(Img::class, [
            "inner here",
            [
                "src" => "https:://google.com/icon.png"
            ]
        ]);
    }

    public function testTagImgMessageExceptionIncorrectArgumentsNumberTagInline()
    {
        $this->expectExceptionMessage('Tags inline contem 1 único parâmetro, array $attributes');
        $img = $this->resolverHtmlTag->resolver(Img::class, [
            "inner here", //! Deveria ter apenas 1 argumento
            [
                "src" => "https:://google.com/icon.png"
            ]
        ]);
    }

    /**
     * @depends testTagImgIsInstanceOfImg
     *
     * @return void
     */
    public function testTagImgRender(TagInterface $img)
    {
        $this->assertEquals('<img src="https:://google.com/icon.png"/>', $img->render());
    }

    public function testTagAIsInstanceOfA()
    {
        $a = $this->resolverHtmlTag->resolver(A::class, [
            "Site",
            [
                "href" => "https://bernardinoslv.com"
            ]
        ]);

        $this->assertInstanceOf(A::class, $a);
        return $a;
    }

    public function testTagAExceptionIncorrectArgumentsNumberTagBlock()
    {
        $this->expectException(IncorrectArgumentsNumberTagBlock::class);
        $a = $this->resolverHtmlTag->resolver(A::class, [
            // "Site",  //! Comentei pois as tags block devem receber 2 argumentos
            [
                "href" => "https://bernardinoslv.com"
            ]
        ]);
    }

    public function testTagAMessageExceptionIncorrectArgumentsNumberTagBlock()
    {
        $this->expectExceptionMessage('Tags block contem 2 parâmentros, string $inner, array $attributes');
        $a = $this->resolverHtmlTag->resolver(A::class, [
            // "Site",  //! Comentei pois as tags block devem receber 2 argumentos
            [
                "href" => "https://bernardinoslv.com"
            ]
        ]);
    }

    /**
     * @depends testTagAIsInstanceOfA
     *
     * @return void
     */
    public function testTagARender(TagInterface $a)
    {
        $this->assertEquals('<a href="https://bernardinoslv.com">Site</a>', $a->render());
    }
}
