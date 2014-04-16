Sastrawi
=========

Sastrawi is a simple PHP library which provides stemming of Indonesian words. Despite its simplicity, this library is  high in quality, well documented, and carefully tested. For more information in english, see [README](https://github.com/andylib/sastrawi/blob/master/README.en.md).


| Development | Master | Releases | Statistics |
| ----------- | ------ | -------- | ---------- |
| [![Build Status](https://travis-ci.org/sastrawi/sastrawi.svg?branch=development)](https://travis-ci.org/sastrawi/sastrawi) [![Code Coverage](https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/coverage.png?s=942cb014be9bbbf41e62c15389663f4253f5efac)](https://scrutinizer-ci.com/g/sastrawi/sastrawi/) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/quality-score.png?s=152027ad0516653ff4eb5b05bff7266aeb600bfd)](https://scrutinizer-ci.com/g/sastrawi/sastrawi/) | [![Build Status](https://travis-ci.org/sastrawi/sastrawi.svg?branch=master)](https://travis-ci.org/sastrawi/sastrawi) | [![Latest Unstable Version](https://poser.pugx.org/sastrawi/sastrawi/v/unstable.png)](https://packagist.org/packages/sastrawi/sastrawi) [![Latest Stable Version](https://poser.pugx.org/sastrawi/sastrawi/v/stable.png)](https://packagist.org/packages/sastrawi/sastrawi) | [![Total Downloads](https://poser.pugx.org/sastrawi/sastrawi/downloads.png)](https://packagist.org/packages/sastrawi/sastrawi) |


Stemming
---------

Indonesia menempati posisi ke-4 negara berpenduduk terbanyak di dunia. Berdasarkan [sumber](http://www.thejakartapost.com/news/2013/06/18/facebook-has-64m-active-indonesian-users.html), pada 2013 tercatat Lebih dari 64 juta pengguna facebook berasal dari Indonesia.

Dalam aktivitas sehari-hari, pengguna internet di Indonesia menggunakan Bahasa Indonesia sebagai bahasa utama. Oleh sebab itu, para _developer_ membutuhkan suatu cara untuk meningkatkan kualitas pencarian dalam bahasa Indonesia. Salah satu cara itu adalah dengan melakukan _stemming_.

_Stemming_ adalah proses mengubah kata berimbuhan menjadi kata dasar. Contohnya:

- menahan => tahan
- memukul-mukul    => pukul


Contoh kasus
-------------

Katakanlah sebuah _blog post_ berisi:

    Rakyat memenuhi halaman gedung untuk menyuarakan isi hatinya.

Pencarian dengan _query_ di bawah ini tidak akan menemukan _post_ di atas,

```sql

SELECT * FROM posts WHERE content LIKE '%suara%'

```

Bahkan metode _fuzzy search_ atau _full text search_ membutuhkan proses _stemming_ untuk meningkatkan kualitas pencarian. Salah satu cara untuk meningkatkannya yaitu dengan menanggalkan imbuhan-imbuhan hingga hanya menyisakan kata dasar seperti berikut:

    rakyat penuh halaman gedung suara isi hati

Lalu kata kunci pencarian juga dijadikan kata dasar:

    Bersuara => suara


Tujuan
-------

- Mempunyai sebuah _library PHP_ yang berkualitas tinggi untuk memudahkan _stemming_ Bahasa Indonesia.
- Mudah diintegrasikan dengan _framework_ / _package_ lainnya.
- Mempunyai _API_ yang sederhana dan mudah digunakan.


Cara Install
-------------

Sastrawi dapat diinstall dengan [Composer](https://getcomposer.org). Di `composer.json` Anda, tambahkan require sastrawi:

```json
{
    "require": {
        "sastrawi/sastrawi": "*"
    }
}
```

Kemudian jalankan `composer install` atau `composer update` dari `command line`. Jika Anda masih belum memahami bagaimana cara menggunakan Composer, silahkan baca [Getting Started with Composer](https://getcomposer.org/doc/00-intro.md).


Penggunaan
-----------

Copy kode berikut di directory project anda. Lalu jalankan file tersebut.

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


Lisensi
--------

The MIT License (MIT). Lihat [License File](https://github.com/sastrawi/sastrawi/blob/master/LICENSE) untuk informasi lebih lengkap.


Pustaka
--------

- Algoritma Nazief dan Adriani
- Effective Techniques for Indonesian Text Retrieval. Jelita Asian B. Comp Sc.(Hons.) [2007]

Algoritma yang digunakan pada _library_ ini adalah hak intelektual masing-masing pemiliknya.

