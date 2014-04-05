Sastrawi
=========

Sastrawi is a simple PHP library which provides stemming of Indonesian words. Despite its simplicity, sastrawi is  high in quality, well documented, and carefully tested.


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


Developers and Contributors
----------------------------

- [Andy Librian](https://github.com/andylibrian)


Credits
--------

- Effective Techniques for Indonesian Text Retrieval. Jelita Asian B. Comp Sc.(Hons.) [2007]

Algorithms and trademarks used in this library are the property of their respective owners.


Installation
-------------


Usage
------


License
--------

The MIT License (MIT). Please see [License File](https://github.com/andylib/sastrawi/blob/master/LICENSE) for more information.
