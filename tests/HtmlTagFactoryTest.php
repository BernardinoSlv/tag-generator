<?php

namespace BernardinoSlv\Solid;

use BernardinoSlv\Solid\Tag\A;
use BernardinoSlv\Solid\Tag\H1;
use BernardinoSlv\Solid\Tag\Img;
use PHPUnit\Framework\TestCase;

class HtmlTagFactoryTest extends TestCase
{
    public function testGetImg()
    {
        $this->assertInstanceOf(Img::class, HtmlTagFactory::get(Img::class, [
            [
                "src" => "https://bernardinoslv.com/img.jpg"
            ]
        ]));
    }

    public function testGetA()
    {
        $this->assertInstanceOf(A::class, HtmlTagFactory::get(A::class, [
            "Site",
            [
                "href" => "https://bernardinoslv.com"
            ]
        ]));
    }
}
