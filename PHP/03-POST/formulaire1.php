<?php
// -----------------------------------------
/*
$_POST est une superglobale qui permet de récupérer les données saisies dans un formulaire.
$_POST est une superglobale, donc est un array, et est disponible dans tous les contextes du script, y compris au sein des fonctions sans faire global $_POST.
syntaxe de l'array : $_POST = array ("name1" => "valeur de l'input", "name2" => "valeur de l'input 2");
*/

echo '<pre>'; var_dump($_POST); echo '</pre>'; // pour vérifier que le formulaire fonctionne et envoie des infos
if(!empty($_POST)){// si $_POST n'est pas vide c'est que le formulaire a été soumis
  // Afficher les données du formulaire :
  echo 'Prénom : ' . $_POST['prenom'] . '<br>'; // l'indice de $_POST correspond au name du formulaire
  echo 'Description' . $_POST['description'] . '<br>';
}

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Mon Formulaire</title>
  </head>
  <body>

    <h1>Formulaire 1</h1>

     <form  action="" method="post">
       <!-- method = comment vont circuler les données.
       action = url de destination des données.
        Si laissé vide, les données circulent vers la page du formulaire -->
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" > <!-- les attributs name permettent de remplir les indices de $_POST-->
        <br>

        <label for="description">Description</label> <!-- l'attribut for est la pour des raisons d'accessibilité : quand on clique sur le label, le curseur se positionne dans l'input d'id correspondant -->
        <textarea id="description" name="description" rows="8" cols="80"></textarea>
        <br>

        <input type="submit" name="validation" value="envoyer">

    </form>

  </body>
</html>
