<?php
/*
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.

	3- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

*/

$affichage = '';

if(!empty($_POST)){
  function montantTTC($montantHT,$periode){

    $taux = array('plusCinq' => 1.10, 'moinCinq' => 1.20);

    return $montantHT * $taux[$periode];
  }
  $affichage .= montantTTC($_POST['montantHT'],$_POST['duree']);

}
echo  '<pre>'; print_r($_POST); echo '</pre>';


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>devis_travaux</title>
  </head>
  <body>

    <h1>Votre devis de travaux</h1>

    <form class="" action="" method="post">

      <div class="">
        <label for="montantHT">Montant des travaux (HT)</label>
        <input type="text" name="montantHT" value="">
      </div>

      <div class="">
        <label >Plus de 5 ans</label>
        <input type="radio" name="duree" value="plusCinq"><br>
        <label>5 ans ou moins</label>
        <input type="radio" name="duree" value="moinCinq">

      </div>

      <div class="">
        <input type="submit" name="valider" value="Valider">
      </div>

      <div class="">
        <?php
        echo $affichage
         ?>
      </div>


    </form>

  </body>
</html>
