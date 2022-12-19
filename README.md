# Tag generator

### Gerador de tags html

Um gerador de tags html de fácil uso, com interfaces e abstrações prontas para fazer expansão com novas tags.

> Uso básico com tags Block (que são derivadas da abstração BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock)


```
use BernardinoSlv\Solid\Html;

$html = new Html;

// criando um link (<a>)
$link = $html->a("Link", [
    "href" => "https://www.bernardinoslv.com",
    "class" => "btn btn-sm btn-info"
]);

//Resultado: <a class="btn btn-sm btn-info" href="https://www.bernardinoslv.com">Link</a>
echo $a;
```

:warning: **Atenção** Recebem 2 argumentos (string $inner, array \$attributes = [])

:memo: **Observação** $attributes é opcional
<br/><br/><br/>

> Uso básico com tags Inline (que são derivadas da abstração BernardinoSlv\Solid\Tag\AbstractTagInline - **Recebem 1 argumento (array \$attributes = [])**)

```
<?php

use BernardinoSlv\Solid\Html;

require_once __DIR__ . "/vendor/autoload.php";

$html = new Html;

$img = $html->img([
    "src" => "https://www.bernardinoslv.com/image.png",
    "title" => "Imagem do meu site",
    "width" => "100px"
]);

echo $img;
// <img src="https://www.bernardinoslv.com/image.png" title="Imagem do meu site" width="100px"/>
```

:bulb: Foi criada respeitando os princípios SOLID, especialmente o Open-Closed Principle, para comprovar isso , vamos criar uma expanção juntos.

> Criando a nova tag \<p>

```
<?php

declare(strict_types=1);

namespace BernardinoSlv\Solid\Tag;

use BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock;

class P extends AbstractTagBlock
{

}
```

:warning: Lembrando que \<p> é uma tag block, sendo assim **devo** extender a classe abstrata (BernardinoSlv\Solid\Tag\Abstract\AbstractTagBlock).

> Usando a nova tag \<p>

```
<?php

use BernardinoSlv\Solid\Html;

require_once __DIR__ . "/vendor/autoload.php";

$html = new Html;

$paragraph = $html->p("paragrafo de test", [
    "style" => "text-align: center;"
]);

echo $paragraph;
// <p style"text-align:center;">paragrafo de test</p>
```

:memo: Ao expandir criando uma nova tag, ela será automaticamente reconhecida pelo Html (BernardinoSlv\Solid\Html)
