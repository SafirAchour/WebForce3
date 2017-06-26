<?php
//-----------------------
// Exercice :
/*
  1 - Réaliser un formulaire permettant de sélectionner un fruit dans une liste déroulante, et de saisir un poids dans un input.
  2 - Traiter les informations du formulaire pour afficher le prix du fruit choisi pour le poids saisi (toujours en passant par la fonction calcul).

*/
include('fonction.inc.php');

echo '<pre>'; var_dump($_POST); echo '</pre>';

if(!empty($_POST['fruit'])){
  // si le formulaire est soumis, $_POST n'est pas vide : 
echo calcul($_POST['fruit'] , $_POST['poids'] );
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
     <h1> Formulaire liste déroulante </h1>

     <form class="" action="" method="post">

       <select class="" name="fruit">

         <option value="bananes">Bananes</option>
         <option value="cerises">Cerises</option>
         <option value="pommes">Pommes</option>
         <option value="peches">Peches</option>

       </select>

      <br>
       <label for="poids">Poids</label>
       <input type="text" name="poids" value="" placeholder="En grammes">

       <br>

       <input type="submit" name="validation" value="envoyer">

     </form>

   </body>
 </html>
