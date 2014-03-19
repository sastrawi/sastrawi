Sastrawi
=========

Sastrawi is a simple PHP library which provides stemming of Indonesian words. Despite its simplicity, this library is  high in quality, well documented, and carefully tested. For more information in english, see [README](https://github.com/andylib/sastrawi/blob/master/README.en.md).


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


_Developer_ dan kontributor
--------------------------

- [Andy Librian](https://github.com/andylib)


Pustaka
--------

- Effective Techniques for Indonesian Text Retrieval. Jelita Asian B. Comp Sc.(Hons.) [2007]

Algoritma yang digunakan pada _library_ ini adalah hak intelektual masing-masing pemiliknya.


Cara Install
-------------


Penggunaan
-----------


Lisensi
--------

The MIT License (MIT). Lihat [License File](https://github.com/andylib/sastrawi/blob/master/LICENSE) untuk informasi lebih lengkap.
