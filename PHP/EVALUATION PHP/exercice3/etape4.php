<?php
/*
Étape 4 :

Créer une page affichant le détail d’un film de manière dynamique. Si le film n’existe pas, une erreur sera affichée.

*/
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$affichage = '';

if(isset($_GET['id_film'])){

  $query = $pdo->prepare("SELECT * FROM movies WHERE id_film = :id_film");
  $query->bindParam(':id_film', $_GET['id_film'],PDO::PARAM_STR);
  $query->execute();

  $film = $query->fetch(PDO::FETCH_ASSOC);


    $affichage .= '<p>Titre : '.$film['title'].'</p>';
    $affichage .= '<p>Acteurs : '.$film['actors'].'</p>';
    $affichage .= '<p>Réalisateur : '.$film['director'].'</p>';
    $affichage .= '<p>Producteur : '.$film['producer'].'</p>';
    $affichage .= '<p>Année de production : '.$film['year_of_prod'].'</p>';
    $affichage .= '<p>Langue : '.$film['language'].'</p>';
    $affichage .= '<p>Catégorie : '.$film['category'].'</p>';
    $affichage .= '<p>Synopsis : '.$film['storyline'].'</p>';
    $affichage .= '<p>Video : '.$film['video'].'</p>';



}
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Etape 4</title>
   </head>
   <body>

     <h1>Détails du film</h1>

         <?php echo $affichage; ?>





   </body>
 </html>
