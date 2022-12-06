<?php

namespace BernardinoSlv\Solid\Tag\Trait;

use BernardinoSlv\Solid\Tag\H1;
use BernardinoSlv\Solid\Tag\Img;
use PHPUnit\Framework\TestCase;

class TraitTagResolverTest extends TestCase
{
    public function testResolver()
    {
        $img = new Img([
            "width" => 100,
            "height" => 50
        ]);

        $this->assertEquals("img", $img->getTag());

        $h1 = new H1("Meu nome é");
        $this->assertEquals("h1", $h1->getTag());
    }
}
