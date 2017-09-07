<?php

use Animal\Continent\Africa\Elephant;
class Tourist
{
    public function watchElephant($continet)
    {
        // $continent doit valoir 'asia' ou 'africa'
        // on instancie l'eléphant qui correspond au continent et on affecte la taille de ses oreilles.
        if ('asia' == $continent)
        {
            $elephant = new AsiaElephant();
        }elseif ('africa' == $continent) {
            $elephant == new Elephant();
            
        } else {
            $msg = "contient $continent is not allowed";
            
        }
        echo 'It has ' . $elephant->getEarsSize() . 'ears'; 
        
    }
}

