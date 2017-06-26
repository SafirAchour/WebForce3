<?php

 //----------------------------------
 // exercice :
 /* Dans listefruits.php : créer 3 liens bananes, kiwi et cerise
 passer le fruit dans l'URL en GET à la page couleur.php
 Dans la  couleur.php  : récupérer le fruit dans l'URL, et afficher sa couleur avec une phrase du type  "La couleur des bananes  est jaune".
 Penser à se prémunir des tentatives d'accès direct à la page couleur.php par une condition */

echo '<pre>'; var_dump($_GET); echo '</pre>';

if(isset($_GET['fruit'])){
// si l'indice article existe, c'est qu'il est dans l' URL :

  if($_GET['fruit'] == 'banane'){
    echo '<p> La couleur des bananes est jaune </p>';
  }elseif ($_GET['fruit'] == 'kiwi') {
    echo '<p> La couleur des kiwis est verte </p>';
  }elseif ($_GET['fruit'] == 'cerise') {
    echo '<p> La couleur des cerises est rouge </p>';
  }
} else {
  echo '<p> <strong> Article inexistant dans la boutique </strong> </p>';
}
