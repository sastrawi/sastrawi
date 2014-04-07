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
 
        for ($i = 0; $i < 3; $i++) {

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
            
            $word = $disambiguated;
            $stemmedWord = $word;
            continue;
        }

        $disambiguated = $this->disambiguatePrefixRule12($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule13($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule14($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule15($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule16($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule17($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule19($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule20($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule21a($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule21b($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule23($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }

            $word = $disambiguated;
            $stemmedWord = $word;
            continue;
        }

        $disambiguated = $this->disambiguatePrefixRule24($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule25($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule26($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule27($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule28($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule29($stemmedWord);
            if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        $disambiguated = $this->disambiguatePrefixRule30($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule32($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }
        
        $disambiguated = $this->disambiguatePrefixRule34($stemmedWord);
        if ($disambiguated !== null) {
            $lookupResult = $this->dictionary->lookup($disambiguated);
            if ($lookupResult !== null) {
                return $lookupResult;
            }
        }

        }

        return $stemmedWord;
    }

    /**
     * @param string $word
     */
    protected function isShortWord($word)
    {
        return (strlen($word) <= 3);
    }
    
    /**
     * Remove inflectional particle : lah|kah|tah|pun
     * @param string $word
     */
    public function removeInflectionalParticle($word)
    {
        return preg_replace('/(lah|kah|tah|pun)$/', '', $word, 1);
    }

    /**
     * Remove inflectional particle : ku|mu|nya
     * @param string $word
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
     * @param string $completeWord
     * @param string $wordAfterRemoved
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
     * @param string $word
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
     * @return string
     */
    public function disambiguatePrefixRule1a($word)
    {
        $matches  = null;
        $contains = preg_match('/^ber([aiueo].*)$/', $word, $matches);

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
        $contains = preg_match('/^ber([aiueo].*)$/', $word, $matches);

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
        $contains = preg_match('/^ber([bcdfghjklmnpqrstvwxyz])([a-z])(.*)$/', $word, $matches);

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
        $contains = preg_match('/^ber([bcdfghjklmnpqrstvwxyz])([a-z])er([aiueo])(.*)$/', $word, $matches);

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
        $contains = preg_match('/^be([bcdfghjklmnpqrstvwxyz])er([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);

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
     * @return string
     */
    public function disambiguatePrefixRule6a($word)
    {
        $matches  = null;
        $contains = preg_match('/^ter([aiueo].*)$/', $word, $matches);

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
        $contains = preg_match('/^ter([aiueo].*)$/', $word, $matches);

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
        $contains = preg_match('/^ter([bcdfghjklmnpqrstvwxyz])er([aiueo].*)$/', $word, $matches);
        
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
        $contains = preg_match('/^ter([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);
        
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
        $contains = preg_match('/^te([bcdfghjklmnpqrstvwxyz])er([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);
        
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
        $contains = preg_match('/^me([lrwy])([aiueo])(.*)$/', $word, $matches);
        
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
        $contains = preg_match('/^mem([bfv])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 12
     * Rule 12 : mempe{r|l} -> mem-pe{r|l}
     */
    public function disambiguatePrefixRule12($word)
    {
        $matches  = null;
        $contains = preg_match('/^mempe([rl])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return 'pe' . $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 13
     * Rule 13 : mem{rV|V} -> me-m{rV|V}
     */
    public function disambiguatePrefixRule13($word)
    {
        $matches  = null;
        $contains = preg_match('/^mem([aiueo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return 'm' . $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 14
     * Rule 14 : men{c|d|j|z} -> men-{c|d|j|z}
     */
    public function disambiguatePrefixRule14($word)
    {
        $matches  = null;
        $contains = preg_match('/^men([cdjz])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 15
     * Rule 15 : men{V} -> me-n{V}
     */
    public function disambiguatePrefixRule15($word)
    {
        $matches  = null;
        $contains = preg_match('/^men([aiueo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return 'n' . $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 16
     * Rule 16 : meng{g|h|q} -> meng-{g|h|q}
     */
    public function disambiguatePrefixRule16($word)
    {
        $matches  = null;
        $contains = preg_match('/^meng([g|h|q])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 17
     * Rule 17 : mengV -> meng-V
     */
    public function disambiguatePrefixRule17($word)
    {
        $matches  = null;
        $contains = preg_match('/^meng([aiueo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 19
     * Rule 19 : mempV -> mem-pV where V != 'e'
     */
    public function disambiguatePrefixRule19($word)
    {
        $matches  = null;
        $contains = preg_match('/^memp([aiuo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return 'p' . $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 20
     * Rule 20 : pe{w|y}V -> pe-{w|y}V
     */
    public function disambiguatePrefixRule20($word)
    {
        $contains = preg_match('/^pe([wy])([aiueo])(.*)$/', $word, $matches);
        
        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
    }

    /**
     * Disambiguate Prefix Rule 21a
     * Rule 21a : perV -> per-V
     */
    public function disambiguatePrefixRule21a($word)
    {
        if (preg_match('/^per([aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 21b
     * Rule 21a : perV -> pe-rV
     */
    public function disambiguatePrefixRule21b($word)
    {
        if (preg_match('/^pe(r[aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 23
     * Rule 23 : perCAP -> per-CAP where C != 'r' AND P != 'er'
     */
    public function disambiguatePrefixRule23($word)
    {
        $contains = preg_match('/^per([bcdfghjklmnpqrstvwxyz])([a-z])(.*)$/', $word, $matches);

        if ($contains === 1) {
            if (preg_match('/^er(.*)$/', $matches[3]) === 1) {
                return;
            }
            
            return $matches[1] . $matches[2] . $matches[3];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 24
     * Rule 24 : perCAerV -> per-CAerV where C != 'r'
     */
    public function disambiguatePrefixRule24($word)
    {
        $matches  = null;
        $contains = preg_match('/^per([bcdfghjklmnpqrstvwxyz])([a-z])er([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return;
            }
            
            return $matches[1] . $matches[2] . 'er' . $matches[3] . $matches[4];
        }
    }

    /**
     * Disambiguate Prefix Rule 25
     * Rule 25 : pem{b|f|v} -> pem-{b|f|v}
     */
    public function disambiguatePrefixRule25($word)
    {
        if (preg_match('/^pem([bfv])(.*)$/', $word, $matches) === 1) {
            return $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 26
     * Rule 26 : pem{rV|V} -> pe-m{rV|V}
     */
    public function disambiguatePrefixRule26($word)
    {
        if (preg_match('/^pem([aiueo])(.*)$/', $word, $matches)) {
            return 'm' . $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 27
     * Rule 27 : pen{c|d|j|z} -> pen-{c|d|j|z}
     */
    public function disambiguatePrefixRule27($word)
    {
        if (preg_match('/^pen([cdjz])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }
    
    /**
     * Disambiguate Prefix Rule 28
     * Rule 28 : pen{V} -> pe-n{V}
     */
    public function disambiguatePrefixRule28($word)
    {
        if (preg_match('/^pen([aiueo])(.*)$/', $word, $matches)) {
            return 'n' . $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 29
     * Rule 29 : peng{g|h|q} -> peng-{g|h|q}
     */
    public function disambiguatePrefixRule29($word)
    {
        if (preg_match('/^peng([g|h|q])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 30
     * Rule 30 : pengV -> peng-V
     */
    public function disambiguatePrefixRule30($word)
    {
        if (preg_match('/^peng([aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 32
     * Rule 32 : pelV -> pe-lV except pelajar -> ajar
     */
    public function disambiguatePrefixRule32($word)
    {
        if ($word == 'pelajar') {
            return 'ajar';
        }
        
        if (preg_match('/^pe(l[aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }
    }

    /**
     * Disambiguate Prefix Rule 34
     * Rule 34 : peCP -> pe-CP where C != {r|w|y|l|m|n} and P != 'er'
     */
    public function disambiguatePrefixRule34($word)
    {
        if (preg_match('/^pe([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches)) {
            if (preg_match('/^er(.*)$/', $matches[2]) === 1) {
                return;
            }
            
            return $matches[1] . $matches[2];
        }
    }
}
