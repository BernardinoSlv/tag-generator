<?php

namespace BernardinoSlv\Solid;

use BernardinoSlv\Solid\Tag\Interface\TagInterface;
use PHPUnit\Framework\TestCase;

class HtmlTest extends TestCase
{
    /**
     * Renderização de imagem
     *
     * @return void
     */
    public function testRenderImg()
    {
        $html = new Html;

        $img = $html->img([
            "src" => "images/image.png"
        ]);

        $this->assertEquals('<img src="images/image.png"/>', $img);
    }

    /**
     * Renderização de link
     *
     * @return void
     */
    public function testRenderA()
    {
        $html = new Html;

        $a = $html->a("Portfólio", [
            "href" => "https://bernardinoslv.com"
        ]);

        $this->assertEquals('<a href="https://bernardinoslv.com">Portfólio</a>', $a);
    }
}
