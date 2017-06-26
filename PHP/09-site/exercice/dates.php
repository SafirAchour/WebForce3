<?php
/*
    1- Créer une fonction qui retourne la conversion d'une date FR en date US ou inversement.
      Cette fonction prend 2 paramètres : une date et le format de conversion "US" ou "FR"

	2- Vous validez que le paramètre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est pas le cas.
*/


function formatDate($date, $format){

  if($format == 'FR'){
    $dateUS = strtotime($date);
    $dateFormatFR = strftime ('%d-%m-%Y', $dateUS);
    return $dateFormatFR;

  }elseif($format == 'US'){
    $dateFR = strtotime($date);
    $dateFormatUS = strftime ('%Y-%m-%d', $dateFR);
    return $dateFormatUS;
  }
};

echo formatDate('1996-10-11', 'FR'). '<br>';

echo formatDate('11-10-1996', 'US'). '<br>';

function conversion($date, $format){

  //Créer un objet date appelé $objetDate :
  $objetDate = new DateTime($date);

  if($format == 'FR'){
    return $objetDate->format('d-m-Y');
  }elseif ($format == 'US') {
    return $objetDate->format('Y-m-d');
  }else {
    return 'Erreur sur le format demandé';
  }
}

echo conversion('1996-10-11', 'FR') . '<br>';

echo conversion('11-10-1996', 'US') . '<br>';
