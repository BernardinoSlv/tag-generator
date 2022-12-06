<?php

namespace BernardinoSlv\Solid\Tag;

use BernardinoSlv\Solid\Tag\Abstract\AbstractTagInline;
use PHPUnit\Framework\TestCase;

class ImgTest extends TestCase
{
    private ?Img $img = null;

    protected function setUp(): void
    {
        $this->img = new Img([
            "src" => "fotos/perfil.jpg"
        ]);
    }

    public function testIsAbstractedOfAbstractTagInline()
    {
        $this->assertInstanceOf(AbstractTagInline::class, $this->img);
    }

    public function testRender()
    {
        $this->assertEquals("img", $this->img->getTag());
        $this->assertEquals('<img src="fotos/perfil.jpg"/>', $this->img->render());
    }

    public function testIsInline()
    {
        $this->assertTrue($this->img->isInline());
    }

    public function testIsNotBlock()
    {
        $this->assertFalse($this->img->isBlock());
    }
}
