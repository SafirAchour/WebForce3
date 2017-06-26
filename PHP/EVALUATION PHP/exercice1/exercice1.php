<?php
/* Exercice 1 : « On se présente ! »

Créer un tableau en PHP contenant les infos suivantes :
● Prénom
● Nom
● Adresse
● Code Postal
● Ville
● Email
● Téléphone
● Date de naissance au format anglais (YYYY-MM-DD)

 */
$affichage = '';

$presentation = array('prenom'=>'Teva','nom'=>'Natchitz','adresse'=>'Avenue Jean Jaures','code postal'=>'93500','ville'=>'Pantin','email'=>'t.n@hotmail.fr','telephone'=>'0102030405','date de naissance'=>'1996-10-11');

echo  '<pre>'; print_r($presentation); echo '</pre>';

// A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML. La date sera affichée au format français (DD/MM/YYYY).

foreach($presentation as $indice => $value){

  if($indice !== 'date de naissance'){

  echo '<p><li>' . $indice  . ' = ' . $value .'</li></p>';

}else{ // Bonus :  Gérer l’affichage de la date de naissance à l’aide de la classe DateTime

    $date = new DateTime ($value);

    echo '<p><li>' . $date->format ('d-m-Y') . '</li></p>';
  }

}

 ?>
