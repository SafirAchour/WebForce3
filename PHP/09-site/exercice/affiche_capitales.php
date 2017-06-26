<?php
/*
   Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, blablabla, Berlin.

   Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).

   Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente.


*/

$affichage= '';

$pays = array('France' => 'Paris', 'Italie' => 'Rome', 'Espagne' => 'Madrid', 'inconnu' => 'blablabla', 'Allemagne' => 'Berlin');
foreach($pays as $indices => $capitales){
  if($indices != 'inconnu'){
  $affichage .= "<h1> La capitale $capitales se situe en  $indices</h1>";
}else {
    $affichage .= "<p>Ca n'existe pas</p>";
}}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EXERCIE LES CAPITALES</title>
  </head>
  <body>
    <h1>Les pays et ses capitales</h1>
    <?php echo $affichage ?>
  </body>
</html>
