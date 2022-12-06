<?php

namespace BernardinoSlv\Solid;

use BernardinoSlv\Solid\Tag\Img;
use PHPUnit\Framework\TestCase;

class HtmlTagFactoryTest extends TestCase
{
    public function testGetTagImg()
    {
        HtmlTagFactory::get(Img::class, []);
    }
}
