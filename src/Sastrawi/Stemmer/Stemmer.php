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
}
