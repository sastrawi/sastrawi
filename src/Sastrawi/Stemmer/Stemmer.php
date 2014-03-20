<?php

namespace Sastrawi\Stemmer;

class Stemmer
{
    /**
     * Remove inflectional particle : lah|kah|tah|pun
     */
    public function removeInflectionalParticle($word)
    {
        return preg_replace('/lah|kah|tah|pun$/', '', $word);
    }

    /**
     * Remove inflectional particle : ku|mu|nya
     */
    public function removeInflectionalPossessivePronoun($word)
    {
        return preg_replace('/ku|mu|nya$/', '', $word);
    }

}
