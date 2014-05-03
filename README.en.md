Sastrawi
=========

Sastrawi is a simple PHP library which provides stemming of words in Indonesian Language (Bahasa).
Despite its simplicity, this library is  designed to be high quality and well documented.
For more information in english, see [README](https://github.com/andylib/sastrawi/blob/master/README.en.md).


| Development | Master | Releases | Statistics |
| ----------- | ------ | -------- | ---------- |
| [![Build Status](https://travis-ci.org/sastrawi/sastrawi.svg?branch=development)](https://travis-ci.org/sastrawi/sastrawi) [![Code Coverage](https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/coverage.png?s=942cb014be9bbbf41e62c15389663f4253f5efac)](https://scrutinizer-ci.com/g/sastrawi/sastrawi/) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/quality-score.png?s=152027ad0516653ff4eb5b05bff7266aeb600bfd)](https://scrutinizer-ci.com/g/sastrawi/sastrawi/) | [![Build Status](https://travis-ci.org/sastrawi/sastrawi.svg?branch=master)](https://travis-ci.org/sastrawi/sastrawi) | [![Latest Unstable Version](https://poser.pugx.org/sastrawi/sastrawi/v/unstable.png)](https://packagist.org/packages/sastrawi/sastrawi) [![Latest Stable Version](https://poser.pugx.org/sastrawi/sastrawi/v/stable.png)](https://packagist.org/packages/sastrawi/sastrawi) | [![Total Downloads](https://poser.pugx.org/sastrawi/sastrawi/downloads.png)](https://packagist.org/packages/sastrawi/sastrawi) |


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


Demo
----
[http://sastrawi.github.io](http://sastrawi.github.io)


Installation
-------------

Sastrawi can be installed with [Composer](https://getcomposer.org). Add sastrawi into your `composer.json`:

```json
{
    "require": {
        "sastrawi/sastrawi": "*"
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

The MIT License (MIT). Please see [License File](https://github.com/sastrawi/sastrawi/blob/master/LICENSE) for more information.


Credits
--------

#### Algorithms ####

Algorithms and trademarks used in this library are the property of their respective owners.

- Algoritma Nazief dan Adriani
- Asian J. 2007. ___Effective Techniques for Indonesian Text Retrieval___. PhD thesis School of Computer Science and Information Technology RMIT University Australia
- Arifin, A.Z., I.P.A.K. Mahendra dan H.T. Ciptaningtyas. 2009. ___Enhanced Confix Stripping Stemmer and Ants Algorithm for Classifying News Document in Indonesian Language___, Proceeding of International Conference on Information & Communication Technology and Systems (ICTS)
- A. D. Tahitoe, D. Purwitasari. 2010. ___Implementasi Modifikasi Enhanced Confix Stripping Stemmer Untuk Bahasa Indonesia dengan Metode Corpus Based Stemming___, Institut Teknologi Sepuluh Nopember (ITS) – Surabaya, 60111, Indonesia

#### Root word dictionary ####

Sastrawi rely heavily on a root word dictionary. It is based on [kateglo.com](http://kateglo.com) with some modifications.


License
--------

Sastrawi is released under The MIT License (MIT) while Kateglo's root word dictionary is under [CC-BY-NC-SA 3.0](http://creativecommons.org/licenses/by-nc-sa/3.0/). For more information please see [Sastrawi License File](https://github.com/sastrawi/sastrawi/blob/master/LICENSE) and [Kateglo's content license](https://github.com/ivanlanin/kateglo#lisensi-isi).


More Information
----------------

- [API Documentation](http://sastrawi.github.io/sastrawi-api-doc/master/)
- [FAQ](https://github.com/sastrawi/sastrawi/wiki/FAQ)
- [Wiki](https://github.com/sastrawi/sastrawi/wiki)
- [Roadmap](https://github.com/sastrawi/sastrawi/issues/milestones)
- [Bug Report, Questions, Ideas](https://github.com/sastrawi/sastrawi/issues)
