# Oxi  Brasil API

Classe de consumo Brasil API

Uma maneira simples de interagir com api do Brasil Api.

Pessoal que fez isso aee é do céu mano, tah tudo num lugar só!

Da uma olhadinha no site lah:
- [Brasil API](https://brasilapi.com.br/)


```php
require __DIR__ . '/vendor/autoload.php';

(new Brasil\Api)->banco('341');

//resultado
Array
(
    [ispb] => 60701190
    [name] => ITAÚ UNIBANCO S.A.
    [code] => 341
    [fullName] => ITAÚ UNIBANCO S.A.
)

```
## É muito facinho de usar, vê aee!


Tah a fim de ver uma lista com todos os bancos no Brasil, olhae como tu faz!

```php
(new Brasil\Api)->bancos();

//resultado
Array
(
    [0] => Array
        (
            [ispb] => 00000000
            [name] => BCO DO BRASIL S.A.
            [code] => 1
            [fullName] => Banco do Brasil S.A.
        )

    [1] => Array
        (
            [ispb] => 00000208
            [name] => BRB - BCO DE BRASILIA S.A.
            [code] => 70
            [fullName] => BRB - BANCO DE BRASILIA S.A.
        )
...
```

Eta poxa, bão pra cass...

Agora olha só, como tu faz pra ver mais detalhes de um banco, você só bota o número do banco na função e já era

```php
(new Brasil\Api)->banco('341');

//resultado
Array
(
    [ispb] => 60701190
    [name] => ITAÚ UNIBANCO S.A.
    [code] => 341
    [fullName] => ITAÚ UNIBANCO S.A.
)

```

Tah facil neh!

Esse pessoal não perde tempo, da uma olhada ai, como você vê todos os tipo de marcas por tipo de veiculo.


```php
//Só as marcas das Motoca
(new Brasil\Api)->motos();

//Só as Naves
(new Brasil\Api)->carros();

//Aqui só os gigantes hein!
(new Brasil\Api)->caminhoes();

//resultado das Motoca
Array
(
    [0] => Array
        (
            [nome] => ADLY
            [valor] => 60
        )

    [1] => Array
        (
            [nome] => AGRALE
            [valor] => 61
        )

    [2] => Array
        (
            [nome] => APRILIA
            [valor] => 62
        )
...
```

Caraca, tem coisa demais lah!

Essa do CEP ficou TOPIII, pq os caras fazem consulta em múltiplos providers.

```php
(new Brasil\Api)->cep('18013900');

Array
(
    [cep] => 18013900
    [state] => SP
    [city] => Sorocaba
    [neighborhood] => Jardim do Paço
    [street] => Avenida Engenheiro Carlos Reinaldo Mendes
    [service] => viacep
    [location] => Array
        (
            [type] => Point
            [coordinates] => Array
                (
                    [longitude] => -47.428788
                    [latitude] => -23.4858059
                )
        )
)

```

Ixii mariaaa... olha o restante aee!

Feriados Nacionais:

```php
(new Brasil\Api)->feriados('2021');
```

CNPJ:

```php
(new Brasil\Api)->cnpj('12345678901234');
```

Lista de estado:

```php
(new Brasil\Api)->estados();
```

Detalhes do Estado:

```php
(new Brasil\Api)->estado('SP');
```

Lista de Municipios por Estado:

```php
(new Brasil\Api)->municipios('SP');
```

Tabela de Referencia da FIPE

```php
(new Brasil\Api)->fipe('SP');
```
Tabela de Preço do Carro FIPE

```php
(new Brasil\Api)->precofipe('codigo-fipe');
```

Retorna estado e lista de cidades por DDD
```php
(new Brasil\Api)->ddd('11');
```

Boa sorte e bom uso pra vc!

;)