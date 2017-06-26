<?php
/*
Exercice 2 : « On part en voyage  »

Créer une fonction permettant de convertir un montant en euros vers un montant en dollars américains.

Cette fonction prendra deux paramètres :
● Le montant de type int ou float
● La devise de sortie (uniquement EUR ou USD).

Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :  1 euro = 1.085965 dollars américains

Il faut effectuer les vérifications nécessaires afin de valider les paramètres.


*/
$affichage = '';

function conversion($montant,$devise){

  $valeur = array('USD' => 1.085965, 'EUR' => 1);

  if($devise == 'EUR'){
    echo  '<pre>'; print_r($devise); echo '</pre>';

    return $montant.' euro = ' . $montant * 1.085965 .' dollars américains';



  }elseif($devise == 'USD'){
    echo  '<pre>'; print_r($devise); echo '</pre>';


    return $montant .' dollars américains = '.$montant / 1.085965 . ' euro';


  }

}


echo conversion(3,'EUR');
