<?php

//---------------------------
/* Exercice :
  - Faire 4 liens HTML avec le nom des fruits ( cerises, bananes, pommes, peches)
  - Quand on clique sur un lien, on affiche le prix du fruit choisi pour 1000g (dans la page lien_fruits.php).

  - Remarque : utilisez la fonction calcul() pour obtenir le prix total !
  */

  include('fonction.inc.php');

  echo '<pre>'; var_dump($_GET); echo '</pre>';

  // On met une condition qui verifie qu'on a bien les infos dans l'URL :
  if(isset($_GET['fruit'])){
  // si existe les indices ' article', 'couleur', et 'prix' :
  echo calcul($_GET['fruit'] , 1000);
  echo '<br>';

  }else {
    echo '<p> CE PRODUIT N\'EXISTE PAS </p>';
  }
  ?>

  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <a href="liens_fruits.php?fruit=cerises">Cerises</a>
      <a href="liens_fruits.php?fruit=bananes">Bananes</a>
      <a href="liens_fruits.php?fruit=pommes">Pommes</a>
      <a href="liens_fruits.php?fruit=peches">Peches</a>

    </body>
  </html>
