<?php

namespace BernardinoSlv\Solid\Tag;

use BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock;
use PHPUnit\Framework\TestCase;

class ATest extends TestCase
{
    private ?A $a = null;

    protected function setUp(): void
    {
        $this->a = new A("Portfólio", [
            "href" => "https://bernardinoslv.com"
        ]);
    }

    public function testIsAbstractedOfAbstractTagBlock()
    {
        $this->assertInstanceOf(AbstractTagBlock::class, $this->a);
    }

    public function testRender()
    {
        $this->assertEquals('<a href="https://bernardinoslv.com">Portfólio</a>', $this->a->render());
    }

    public function testIsBlock()
    {
        $this->assertTrue($this->a->isBlock());
    }

    public function testIsNotInline()
    {
        $this->assertFalse($this->a->isInline());
    }
}
