Sastrawi
=========

Sastrawi es una simple librería PHP que proporciona derivados de palabras en idioma indonesio (Bahasa).
A pesar de su sencillez, esta biblioteca está diseñada para ser de alta calidad y bien documentada.



| Desarrollo | Master | Comunicados | Estadísticas |
| ----------- | ------ | -------- | ---------- |
| [! [Construir estado] (https://travis-ci.org/sastrawi/sastrawi.svg?branch=development)] (https://travis-ci.org/sastrawi/sastrawi) [! [Cobertura de código] (https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/coverage.png?s=942cb014be9bbbf41e62c15389663f4253f5efac)] (https://scrutinizer-ci.com/g/sastrawi/sastrawi/) [! [Scrutinizer código calidad] (https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/quality-score.png?s=152027ad0516653ff4eb5b05bff7266aeb600bfd)] (https://scrutinizer-ci.com/g/sastrawi/sastrawi/) | [! [Construir estado] (https://travis-ci.org/sastrawi/sastrawi.svg?branch=master)] (https://travis-ci.org/sastrawi/sastrawi) | [! [Última inestable versión] (https://poser.pugx.org/sastrawi/sastrawi/v/unstable.png)] (https://packagist.org/packages/sastrawi/sastrawi) [! [Última versión estable] (https://poser.pugx.org/sastrawi/sastrawi/v/stable.png)] (https://packagist.org/packages/sastrawi/sastrawi) | [! [Total descargas] (https://poser.pugx.org/sastrawi/sastrawi/downloads.png)] (https://packagist.org/packages/sastrawi/sastrawi) |


¿Por qué?
-----

Indonesia es el país cuarto más poblado del mundo. Indonesia de usuarios de internet utilizan idioma indonesio como lengua primaria. Por lo tanto, los desarrolladores necesitan una herramienta para mejorar el texto en idioma indonesio. Una de las herramientas más importantes es una despalilladora.

Detener es el proceso de reducción de variantes morfológicas de una palabra a una forma común de la madre. Algunas investigaciones ha demostrado que detener es dependiente del idioma.


Problemas con el enfoque común de la búsqueda
-------------------------------------

Supongamos que tenemos un blog de contenido:

Rakyat memenuhi halaman gedung untuk menyuarakan isi hatinya.

La consulta siguiente dará como resultado ninguno.

```sql
SELECT * FROM posts WHERE content LIKE '%suara%'
```

Herramienta de búsqueda de texto completo aún borroso necesita una despalilladora para mejorar el resultado. Una posible mejora sería indexar la versión reducida de la frase como sigue:

Rakyat penuh halaman gedung suara isi hati

También reduciría la palabra clave de búsqueda:

Bersuara => suara


Nuestros objetivos
----------

-Con una biblioteca PHP de alta calidad para facilitar que surgen palabras indonesias.
-Integrarse bien con otros paquetes / Marcos.
-Tener un API simple y fácil de usar


Versión parcial de programa
----
[http://sastrawi.github.io] (http://sastrawi.github.io)


Instalación
-------------

Sastrawi puede instalarse con [compositor] (https://getcomposer.org). Añadir a sastrawi a tu 'composer.json':

```json
{
    "require": {
        "sastrawi/sastrawi": "*"
    }
}
```

Ejecute 'compositor instalar' o 'actualización del compositor' de 'línea de comandos'.


Uso
------

Copie el código siguiente en un archivo php en el directorio de tu proyecto. Luego llamarlo desde línea de comandos.

```php
<?php
// demo.php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// create stemmer
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();

// stem
$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';
$output   = $stemmer->stem($sentence);

echo $output . "\n";
// will print:
// ekonomi indonesia sedang dalam tumbuh yang bangga
```

Licencia de
--------

La licencia MIT (MIT). Por favor vea [archivo de licencia] (https://github.com/sastrawi/sastrawi/blob/master/LICENSE) para más información.


Créditos
--------

### Algoritmos de ###

Algoritmos y marcas usadas en esta biblioteca son propiedad de sus respectivos propietarios.

- Algoritma Nazief dan Adriani
- Asian J. 2007. ___Effective Techniques for Indonesian Text Retrieval___. PhD thesis School of Computer Science and Information Technology RMIT University Australia
- Arifin, A.Z., I.P.A.K. Mahendra dan H.T. Ciptaningtyas. 2009. ___Enhanced Confix Stripping Stemmer and Ants Algorithm for Classifying News Document in Indonesian Language___, Proceeding of International Conference on Information & Communication Technology and Systems (ICTS)
- A. D. Tahitoe, D. Purwitasari. 2010. ___Implementasi Modifikasi Enhanced Confix Stripping Stemmer Untuk Bahasa Indonesia dengan Metode Corpus Based Stemming___, Institut Teknologi Sepuluh Nopember (ITS) – Surabaya, 60111, Indonesia

### Diccionario raíz ###

Sastrawi dependen en gran medida de un diccionario de palabras de raíz. Se basa en [kateglo.com] (http://kateglo.com) con algunas modificaciones.


Licencia de
--------

Sastrawi es liberado bajo la licencia de MIT (MIT) Diccionario de Kateglo raíz es bajo [CC-BY-NC-SA 3.0] (http://creativecommons.org/licenses/by-nc-sa/3.0/). Para más información por favor vea [S]
