<?php

// ----------------------------------
// Exercice :
/*

  - réaliser un formulaire 'pseudo' et 'email' dans formulaire3.php
  - récupérer les données saisies dans le formulaire  dans la page formulaire4.php et les afficher.

  - De plus, si le champ pseudo est laissé vide, afficher un message dans formulaire4.php qui précise que le champ est obligatoire.
  */

 ?>

 <html>
   <head>
     <meta charset="utf-8">
     <title>Mon 3ème Formulaire</title>
   </head>
   <body>

     <form class="" action="formulaire4.php" method="post">
        <label for="pseudo">Pseudo</label>
        <input id="pseudo" type="text" name="pseudo" value="">
        <br>

        <label for="mail">EMAIL</label>
        <input id="mail" type="text" name="mail" value="">
        <br>

        <input type="submit" name="validation" value="ENVOYER">

     </form>

   </body>
 </html>
