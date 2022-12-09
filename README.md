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
:warning: **Atenção** Recebem 2 argumentos (string $inner, array $attributes = [])
:memo: **Observação** $attributes é opcional
<br/><br/><br/>


> Uso básico com tags Inline (que são derivadas da abstração BernardinoSlv\Solid\Tag\AbstractTagInline - **Recebem 1 argumento ($array $attributes = [])**)


