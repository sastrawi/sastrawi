<?php

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\DictionaryInterface;

class Stemmer
{
    protected $dictionary;
    
    public function __construct(DictionaryInterface $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function getDictionary()
    {
        return $this->dictionary;
    }
    
    /**
     * Stem a word to its common stem form
     *
     * @param string $word the word to stem, e.g : mengalahkan
     * @return string common stem form, e.g : kalah
     */
    public function stem($word)
    {
        if ($this->isShortWord($word)) {
            return $word;
        }
        
        $lookupResult = $this->dictionary->lookup($word);
        if ($lookupResult !== null) {
            return $lookupResult;
        }

        $stemmedWord = $this->removeInflectionalParticle($word);
        $lookupResult = $this->dictionary->lookup($stemmedWord);
        if ($lookupResult !== null) {
            return $lookupResult;
        }

        $stemmedWord = $this->removeInflectionalPossessivePronoun($stemmedWord);
        $lookupResult = $this->dictionary->lookup($stemmedWord);
        if ($lookupResult !== null) {
            return $lookupResult;
        }

        $stemmedWord = $this->removeDerivationalSuffix($stemmedWord);
        $lookupResult = $this->dictionary->lookup($stemmedWord);
        if ($lookupResult !== null) {
            return $lookupResult;
        }

        $stemmedWord = $this->removePlainPrefix($stemmedWord);
        $lookupResult = $this->dictionary->lookup($stemmedWord);
        if ($lookupResult !== null) {
            return $lookupResult;
        }

        $disambiguated = $this->disambiguatePrefixRule1a($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule1b($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule2($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule3($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule4($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule5($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule6a($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule6b($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule7($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule8($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule9($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule10($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule11($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule12($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        return $stemmedWord;
    }

    protected function isShortWord($word)
    {
        return (strlen($word) <= 3);
    }
    
    /**
     * Remove inflectional particle : lah|kah|tah|pun
     */
    public function removeInflectionalParticle($word)
    {
        return preg_replace('/(lah|kah|tah|pun)$/', '', $word, 1);
    }

    /**
     * Remove inflectional particle : ku|mu|nya
     */
    public function removeInflectionalPossessivePronoun($word)
    {
        return preg_replace('/(ku|mu|nya)$/', '', $word, 1);
    }
    
    /**
     * Remove derivational suffix : i|kan|an
     */
    public function removeDerivationalSuffix($word)
    {
        return preg_replace('/(i|kan|an)$/', '', $word, 1);
    }

    /**
     * Get removed affix
     */
    public function getRemovedAffix($completeWord, $wordAfterRemoved)
    {    
        return preg_replace("/$wordAfterRemoved/", '', $completeWord, 1);
    }

    /**
     * Remove plain prefix : di|ke|se
     */
    public function removePlainPrefix($word)
    {
        return preg_replace('/^(di|ke|se)/', '', $word, 1);
    }

    /**
     * Does the word contain invalid affix pair?
     * ber-i|di-an|ke-i|ke-an|me-an|ter-an|per-an
     */
    public function containsInvalidAffixPair($word)
    {
        if (preg_match('/^me(.*)kan$/', $word) === 1) {
            return false;
        }

        if ($word == 'ketahui') {
            return false;
        }

        $contains = false 
                    || preg_match('/^ber(.*)i$/', $word) === 1
                    || preg_match('/^di(.*)an$/', $word) === 1
                    || preg_match('/^ke(.*)i$/', $word) === 1
                    || preg_match('/^ke(.*)an$/', $word) === 1
                    || preg_match('/^me(.*)an$/', $word) === 1
                    || preg_match('/^ter(.*)an$/', $word) === 1
                    || preg_match('/^per(.*)an$/', $word) === 1;

        return $contains;
    }

    /**
     * Disambiguate Prefix Rule 1a
     * Rule 1a : berV -> ber-V
     */
    public function disambiguatePrefixRule1a($word)
    {
        $matches  = null;
        $contains = preg_match('/ber([aiueo].*)/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }

    /**
     * Disambiguate Prefix Rule 1b
     * Rule 1b : berV -> be-rV
     */
    public function disambiguatePrefixRule1b($word)
    {
        $matches  = null;
        $contains = preg_match('/ber([aiueo].*)/', $word, $matches);

        if ($contains === 1) {
            return 'r' . $matches[1];
        }
    }

    /**
     * Disambiguate Prefix Rule 2
     * Rule 2 : berCAP -> ber-CAP where C != 'r' AND P != 'er'
     */
    public function disambiguatePrefixRule2($word)
    {
        $matches  = null;
        $contains = preg_match('/ber([bcdfghjklmnpqrstvwxyz])([a-z])(.*)/', $word, $matches);

        if ($contains === 1) {
            if (preg_match('/^er(.*)$/', $matches[3]) === 1) {
                return;
            }
            
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 3
     * Rule 3 : berCAerV -> ber-CAerV where C != 'r'
     */
    public function disambiguatePrefixRule3($word)
    {
        $matches  = null;
        $contains = preg_match('/ber([bcdfghjklmnpqrstvwxyz])([a-z])er([aiueo])(.*)/', $word, $matches);

        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }
            
            return $matches[1] . $matches[2] . 'er' . $matches[3] . $matches[4];
        }
    }

    /**
     * Disambiguate Prefix Rule 4
     * Rule 4 : belajar -> bel-ajar
     */
    public function disambiguatePrefixRule4($word)
    {
        if ($word == 'belajar') {
            return 'ajar';
        }
    }

    /**
     * Disambiguate Prefix Rule 5
     * Rule 5 : beC1erC2 -> be-C1erC2 where C1 != 'r'
     */
    public function disambiguatePrefixRule5($word)
    {
        $matches  = null;
        $contains = preg_match('/be([bcdfghjklmnpqrstvwxyz])er([bcdfghjklmnpqrstvwxyz])(.*)/', $word, $matches);

        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }
            
            return $matches[1] . 'er' . $matches[2] . $matches[3];
        }
    }

    /**
     * Disambiguate Prefix Rule 6a
     * Rule 6a : terV -> ter-V
     */
    public function disambiguatePrefixRule6a($word)
    {
        $matches  = null;
        $contains = preg_match('/ter([aiueo].*)/', $word, $matches);

        if ($contains === 1) {
            return $matches[1];
        }
    }

    /**
     * Disambiguate Prefix Rule 6b
     * Rule 6b : terV -> te-rV
     */
    public function disambiguatePrefixRule6b($word)
    {
        $matches  = null;
        $contains = preg_match('/ter([aiueo].*)/', $word, $matches);

        if ($contains === 1) {
            return 'r' . $matches[1];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 7
     * Rule 7 : terCerv -> ter-CerV where C != 'r'
     */
    public function disambiguatePrefixRule7($word)
    {
        $matches  = null;
        $contains = preg_match('/ter([bcdfghjklmnpqrstvwxyz])er([aiueo].*)/', $word, $matches);
        
        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }
            
            return $matches[1] . 'er' . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 8
     * Rule 8 : terCP -> ter-CP where C != 'r' and P != 'er'
     */
    public function disambiguatePrefixRule8($word)
    {
        $matches  = null;
        $contains = preg_match('/ter([bcdfghjklmnpqrstvwxyz])(.*)/', $word, $matches);
        
        if ($contains === 1) {
            if ($matches[1] === 'r' || preg_match('/^er(.*)$/', $matches[2]) === 1) {
                return;
            }
            
            return $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 9
     * Rule 9 : te-C1erC2 -> te-C1erC2 where C1 != 'r'
     */
    public function disambiguatePrefixRule9($word)
    {
        $matches  = null;
        $contains = preg_match('/te([bcdfghjklmnpqrstvwxyz])er([bcdfghjklmnpqrstvwxyz])(.*)/', $word, $matches);
        
        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }
            
            return $matches[1] . 'er' . $matches[2] . $matches[3];
        }
    }

    /**
     * Disambiguate Prefix Rule 10
     * Rule 10 : me{l|r|w|y}V -> me-{l|r|w|y}V
     */
    public function disambiguatePrefixRule10($word)
    {
        $matches  = null;
        $contains = preg_match('/me([lrwy])([aiueo])(.*)/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }

    /**
     * Disambiguate Prefix Rule 11
     * Rule 11 : mem{b|f|v} -> mem-{b|f|v}
     */
    public function disambiguatePrefixRule11($word)
    {
        $matches  = null;
        $contains = preg_match('/mem([bfv])(.*)/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 12
     * Rule 11 : mempe{r|l} -> mem-pe{r|l}
     */
    public function disambiguatePrefixRule12($word)
    {
        $matches  = null;
        $contains = preg_match('/mempe([rl])(.*)/', $word, $matches);
        
        if ($contains === 1) {
            return 'pe' . $matches[1] . $matches[2];
        }
    }
}
