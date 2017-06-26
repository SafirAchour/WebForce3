<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location.

   2- Vous créez une fonction prixLoc qui calcule le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. Elle retourne la chaine "La location de votre véhicule sera de X euros pour Y jour(s)." où X et Y sont variables.

   4- Lorsque le formulaire est soumis, vous affichez le résultat.

*/


if(!empty($_POST)){
  function prixLoc($categorie, $jour){
    $prix = array('a'=> 30, 'b' => 50, 'c'=> 70, 'd'=> 90);

    return $prix[$categorie] * $jour. '<br>';

  }
echo prixLoc($_POST['categorie'],$_POST['jour']);

}
echo  '<pre>'; print_r($_POST); echo '</pre>';

/*

$message = '';
$categorie = array('A' => 30, 'B' => 50, 'C' => 70, 'D' => 90);

function prixloc($categorie, $nbjours){
switch($categorie){
  case 'A' : $prix = 30; break;
  case 'B' : $prix = 50; break;
  case 'C' : $prix = 70; break;
  case 'D' : $prix = 90; break;
}
$prixloc = $nbjours * $prix;

return "la location de votre vehicule sera de $prixloc euros pour $nbjours jours."
}

if(!empty($_POST)){
$message = prixloc($_POST['categorie'], $_POST['nbjours']');
}
*/



?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Location Voiture</title>
  </head>
  <body>
    <h1>Louer une voiture</h1>

    <form class="" action="" method="post">
      <div class="">
        <label for="categorie">Catégories de véhicules</label>
        <select class="" name="categorie">
          <option value="a">A</option>
          <option value="b">B</option>
          <option value="c">C</option>
          <option value="d">D</option>
        </select>
      </div>

      <div class="">
        <label for="jour">Nombre de jours</label>
        <input type="text" name="jour" value="">
      </div>

      <div class="">
        <input type="submit" name="valider" value="valider">
      </div>


    </form>

  </body>
</html>
