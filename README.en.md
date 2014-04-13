Sastrawi
=========

Sastrawi is a simple PHP library which provides stemming of Indonesian words. Despite its simplicity, sastrawi is  high in quality, well documented, and carefully tested.


| Development | Master | Releases |
| ----------- | ------ | -------- |
| [![Build Status](https://travis-ci.org/andylibrian/sastrawi.svg?branch=development)](https://travis-ci.org/andylibrian/sastrawi) [![Code Coverage](https://scrutinizer-ci.com/g/andylibrian/sastrawi/badges/coverage.png?s=d3a758c427f5e0b68fc32d98dfb76b68441dc7b9)](https://scrutinizer-ci.com/g/andylibrian/sastrawi/) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andylibrian/sastrawi/badges/quality-score.png?s=5f7d11afd70dd36fdec255386aa901358b6ce5cd)](https://scrutinizer-ci.com/g/andylibrian/sastrawi/) | [![Build Status](https://travis-ci.org/andylibrian/sastrawi.svg?branch=master)](https://travis-ci.org/andylibrian/sastrawi) | [![Latest Unstable Version](https://poser.pugx.org/andylibrian/sastrawi/v/unstable.png)](https://packagist.org/packages/andylibrian/sastrawi) [![Latest Stable Version](https://poser.pugx.org/andylibrian/sastrawi/v/stable.png)](https://packagist.org/packages/andylibrian/sastrawi) |


Why?
-----

Indonesia is the fourth most populous country in the world. Indonesian internet users use indonesian language as their primary language. So, developers need a tool to improve text searching in Indonesian language. One of the most important tool is a stemmer.

Stemming is the process of reducing morphological variants of a word to a common stem form. Some researches has shown that stemming is language-dependent.


Problems with common search approach
-------------------------------------

Let's say we have a blog content:

    Rakyat memenuhi halaman gedung untuk menyuarakan isi hatinya.

The query below will result none.

```sql

SELECT * FROM posts WHERE content LIKE '%suara%'

```

Even fuzzy full-text-search tool needs a stemmer to improve the result. A possible improvement would be to index the reduced version of the sentence as follow:

    rakyat penuh halaman gedung suara isi hati

We would also reduce the search keyword:

    Bersuara => suara


Our Goals
----------

- Have a high quality PHP library to ease stemming Indonesian words.
- Integrate well with other packages / frameworks.
- Have a simple and easy to use API


Installation
-------------

Sastrawi can be installed with [Composer](https://getcomposer.org). Add sastrawi into your `composer.json`:

```json
{
    "require": {
        "andylibrian/sastrawi": "*"
    }
}
```

Then run `composer install` or `composer update` from `command line`.


Usage
------

Copy the following code into a php file in your project directory. Then call it from command line.

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

License
--------

The MIT License (MIT). Please see [License File](https://github.com/andylib/sastrawi/blob/master/LICENSE) for more information.


Developers and Contributors
----------------------------

- [Andy Librian](https://github.com/andylibrian)


Credits
--------

- Effective Techniques for Indonesian Text Retrieval. Jelita Asian B. Comp Sc.(Hons.) [2007]

Algorithms and trademarks used in this library are the property of their respective owners.
