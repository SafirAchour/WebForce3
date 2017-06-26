<?php
/*
Étape 3 :

Créer une page listant dans un tableau HTML les films présents dans la base de données.
Ce tableau ne contiendra, par film, que le nom du film, le réalisateur et l’année de production.
Une colonne de ce tableau contiendra un lien ​« plus d’infos » permettant de voir la fiche d’un film dans le détail.

 */

 $pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

 $affichage = '';

 $resultat =$pdo->query("SELECT * FROM movies");

 while($info = $resultat->fetch(PDO::FETCH_ASSOC)){

     $affichage .= '<tr>';
       $affichage .= '<td>'.$info['title'].'</td>';
       $affichage .= '<td>'.$info['director'].'</td>';
       $affichage .= '<td>'.$info['year_of_prod'].'</td>' ;
       $affichage .= '<td>
               <a href="etape4.php?id_film='.$info['id_film'].'">Autres Infos</a>
             </td>';
     $affichage .= '</tr>';
 }




?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Etape 3</title>
  </head>
  <body>

    <h1>Listes des films</h1>

    <table class="table" border="2">
      <tr class="info">
          <th>Titre</th>
          <th>Réalisateur</th>
          <th>Année de production</th>
          <th>Autres infos</th>
      </tr>
        <?php echo $affichage; ?>
    </table>




  </body>
</html>
