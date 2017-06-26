<?php
 //-----------------------------------
 //Exercice :
 /*

 - Créer un formulaire avec les champs ville, code postal et adresse
 - Afficher les données saisies par l'internaute juste au-dessus du formulaire en précisant l'étiquette correspondante.*/
echo '<pre>'; var_dump($_POST); echo '</pre>';

if(!empty($_POST)){
// Si le formulaire n'est pas vide c'est qu'il est soumis : 
  echo 'ville : ' . $_POST['ville'] . '<br>';
  echo 'code Postal :' . $_POST['codePostal'] . '<br>';
  echo 'adresse :' . $_POST['adresse'] . '<br>';
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mon 2ème Formulaire</title>
  </head>
  <body>
    <h1>Formulaire 2</h1>

    <form class="" action="" method="post">
      <label for="ville">Ville</label>
      <input type="text" id="ville" name="ville" >
      <br>

      <label for="codePostal">Code Postal</label>
      <input type="number" id="codePostal" name="codePostal" >
      <br>

      <label for="adresse">Adresse</label>
      <textarea id="adresse" name="adresse" rows="8" cols="80"></textarea>
      <br>

      <input type="submit" name="validation" value="envoyer">

    </form>

  </body>
</html>
