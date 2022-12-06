<?php

namespace BernardinoSlv\Solid\Tag;

use BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock;
use PHPUnit\Framework\TestCase;

class H1Test extends TestCase
{
    private ?H1 $h1 = null;

    protected function setUp(): void
    {
        $this->h1 = new H1("Título da página", [
            "class" => "bg-white text-info"
        ]);
    }

    public function testIsAbstractedOfAbstractTagBlock()
    {
        $this->assertInstanceOf(AbstractTagBlock::class, $this->h1);
    }

    public function testRender()
    {
        $this->assertEquals('<h1 class="bg-white text-info">Título da página</h1>', $this->h1->render());
    }

    public function testIsNotInline()
    {
        $this->assertFalse($this->h1->isInline());
    }

    public function testIsBlock()
    {
        $this->assertTrue($this->h1->isBlock());
    }
}
