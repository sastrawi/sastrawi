CHANGELOG
=========

* 1.1.0 (2016-02-07)
  * provide a way to add or remove words in dictionary

* 1.0.10 (2015-09-28)
  * added unit tests for disambiguators (thanks to mohangk)
  * stem -lah|-kah|-tah|-pun as in Dia-lah (thanks to arryanggaputra)

* 1.0.9 (2015-04-11)
  * stem possessive pronoun -ku|-mu|-nya as in nikmat-Ku
  * dictionary : remove plural words

* 1.0.8 (2015-04-05)
  * stem prefix ku-
  * stem prefix kau-

* 1.0.7 (2015-02-28)

  * stem menganga -> nganga
  * dictionary: add "henyak"
  * dictionary: remove "besaran"
  * dictionary: add "kokoh"
  * dictionary: remove invalid root words (containing affixes)
  * dictionary: remove "mendam"
  * dictionary: remove invalid root words "pesinden", "kekhususan"

* 1.0.6 (2015-02-21)

  * stem meniru-nirukan -> tiru, menyepak-nyepak -> sepak, memanggil-manggil -> panggil
  * README : update code example

* 1.0.5 (2014-12-28)

  * remove words from dictionary to prevent overstemming.
  * add words : hembus, congkel, lesat.
  * start to maintain changelog file.

* 1.0.4 (2014-10-18)

  * dictionary : add word nafas

* 1.0.3 (2014-10-16)

  * README : reword installation tutorial

* 1.0.2 (2014-9-14)

  * fixed PSR style

* 1.0.1 (2014-9-14)

  * fixed bug on windows platform because of end line character

* 1.0.0 (2014-7-20)

  * release first stable version

* 0.6.0 (2014-5-17)

  * cache result

* 0.5.0 (2014-5-10)

  * fix multi line issue
  * scrap dictionary

* 0.4.0 (2014-5-3)

  * refactor code
  * implements Modified ECS algorithm (foreign suffixes).
  * release API Documentation

* 0.3.0 (2014-4-26)

  * implements ECS (Enhanced Config Stripping) algorithm.
  * fixed issues

* 0.2.0 (2014-4-20)

  * refactor classes
  * more quality check
  * fixed issues
  * implement Confix Stripping algorithm.

* 0.1.0 (2014-4-9)

  * first release.
  * basic stemming capability.
  * partial implementation of Nazief and Adriani algorithm.
