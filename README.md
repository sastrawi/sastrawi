Sastrawi
=========

Sastrawi is a simple PHP library which provides stemming of words in Indonesian Language (Bahasa).
Despite its simplicity, this library is  designed to be high quality and well documented.
For more information in english, see [README](https://github.com/andylib/sastrawi/blob/master/README.en.md).


| Development | Master | Releases | Statistics |
| ----------- | ------ | -------- | ---------- |
| [![Build Status](https://travis-ci.org/sastrawi/sastrawi.svg?branch=development)](https://travis-ci.org/sastrawi/sastrawi) [![Code Coverage](https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/coverage.png?s=942cb014be9bbbf41e62c15389663f4253f5efac)](https://scrutinizer-ci.com/g/sastrawi/sastrawi/) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sastrawi/sastrawi/badges/quality-score.png?s=152027ad0516653ff4eb5b05bff7266aeb600bfd)](https://scrutinizer-ci.com/g/sastrawi/sastrawi/) | [![Build Status](https://travis-ci.org/sastrawi/sastrawi.svg?branch=master)](https://travis-ci.org/sastrawi/sastrawi) | [![Latest Stable Version](https://poser.pugx.org/sastrawi/sastrawi/v/stable.png)](https://packagist.org/packages/sastrawi/sastrawi) | [![Total Downloads](https://poser.pugx.org/sastrawi/sastrawi/downloads.png)](https://packagist.org/packages/sastrawi/sastrawi) |


Stemming
---------

Indonesia menempati posisi ke-4 negara berpenduduk terbanyak di dunia. Berdasarkan [sumber](http://www.thejakartapost.com/news/2013/06/18/facebook-has-64m-active-indonesian-users.html), pada 2013 tercatat Lebih dari 64 juta pengguna facebook berasal dari Indonesia.

Dalam aktivitas sehari-hari, pengguna internet di Indonesia menggunakan Bahasa Indonesia sebagai bahasa utama. Oleh sebab itu, para _developer_ membutuhkan suatu cara untuk meningkatkan kualitas pencarian dalam bahasa Indonesia. Salah satu cara itu adalah dengan melakukan _stemming_.

_Stemming_ adalah proses mengubah kata berimbuhan menjadi kata dasar. Contohnya:

- menahan => tahan
- berbalas-balasan => balas


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


Sastrawi
--------

- _Library PHP_ untuk _stemming_ Bahasa Indonesia.
- Mudah diintegrasikan dengan _framework_ / _package_ lainnya.
- Mempunyai _API_ yang sederhana dan mudah digunakan.


Demo
----
[http://sastrawi.github.io](http://sastrawi.github.io)


Cara Install
-------------

Sastrawi dapat diinstall dengan [Composer](https://getcomposer.org).

1. Buka terminal (command line) dan arahkan ke directory project Anda.
2. [Download Composer](https://getcomposer.org/download/) dengan cara `php -r "readfile('https://getcomposer.org/installer');" | php`
3. Buat file `composer.json` atau jika sudah ada, tambahkan require sastrawi:

```json
{
    "require": {
        "sastrawi/sastrawi": "*"
    }
}
```

Kemudian jalankan `php composer.phar install` atau `php composer.phar update` dari `command line`. Jika Anda masih belum memahami bagaimana cara menggunakan Composer, silahkan baca [Getting Started with Composer](https://getcomposer.org/doc/00-intro.md).


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


Pustaka
--------

#### Algoritma ####

Algoritma yang digunakan pada _library_ ini adalah hak intelektual masing-masing pemiliknya yang tertera di bawah ini.
Lalu untuk meningkatkan kualitas kode, algoritma tersebut diterapkan ke dalam _Object Oriented Design_.

- Algoritma Nazief dan Adriani
- Asian J. 2007. ___Effective Techniques for Indonesian Text Retrieval___. PhD thesis School of Computer Science and Information Technology RMIT University Australia
- Arifin, A.Z., I.P.A.K. Mahendra dan H.T. Ciptaningtyas. 2009. ___Enhanced Confix Stripping Stemmer and Ants Algorithm for Classifying News Document in Indonesian Language___, Proceeding of International Conference on Information & Communication Technology and Systems (ICTS)
- A. D. Tahitoe, D. Purwitasari. 2010. ___Implementasi Modifikasi Enhanced Confix Stripping Stemmer Untuk Bahasa Indonesia dengan Metode Corpus Based Stemming___, Institut Teknologi Sepuluh Nopember (ITS) – Surabaya, 60111, Indonesia

#### Kamus Kata Dasar ####

Proses stemming oleh Sastrawi sangat bergantung pada kamus kata dasar. Sastrawi menggunakan kamus kata dasar dari [kateglo.com](http://kateglo.com) dengan sedikit perubahan.


Lisensi
--------

Lisensi sastrawi adalah MIT License (MIT) sedangkan lisensi kamus kata dasar dari Kateglo adalah [CC-BY-NC-SA 3.0](http://creativecommons.org/licenses/by-nc-sa/3.0/). Untuk informasi lebih lengkap silahkan lihat [Lisensi Sastrawi](https://github.com/sastrawi/sastrawi/blob/master/LICENSE) dan [Lisensi isi Kateglo](https://github.com/ivanlanin/kateglo#lisensi-isi).


Informasi Lebih Lanjut
----------------------

- [API Documentation](http://sastrawi.github.io/sastrawi-api-doc/master/)
- [FAQ](https://github.com/sastrawi/sastrawi/wiki/FAQ)
- [Wiki](https://github.com/sastrawi/sastrawi/wiki)
- [Roadmap](https://github.com/sastrawi/sastrawi/issues/milestones)
- [Bug Report, Questions, Ideas](https://github.com/sastrawi/sastrawi/issues)
