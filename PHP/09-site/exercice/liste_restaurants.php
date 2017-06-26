<?php
/*
	1- Afficher dans une table HTML la liste des restaurants avec les champs nom et téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un restaurant quand on clique sur le lien "autres infos".



*/
$affichage = '';


$pdo = new PDO('mysql:host=localhost;dbname=restaurants', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$liste = $pdo->query("SELECT * FROM restaurant");

while($AutreInfo = $liste->fetch(PDO::FETCH_ASSOC)){

      $affichage .='<tr>';
      $affichage .= '<td>'.$AutreInfo['nom'].'</td>';
      $affichage .= '<td>'.$AutreInfo['telephone'].'</td>' ;
      $affichage .= '<td>
              <a href="?id_restaurant='.$AutreInfo['id_restaurant'].'">Autres Infos</a>
            </td>';
      $affichage .= '</tr>';
}

if(isset($_GET['id_restaurant'])){

  $query = $pdo->prepare("SELECT * FROM restaurant WHERE id_restaurant = :id_restaurant");
  $query->bindParam(':id_restaurant', $_GET['id_restaurant'],PDO::PARAM_INT);
  $query->execute();

  $restaurant = $query->fetch(PDO::FETCH_ASSOC);


    $affichage .= '<p>Nom : '.$restaurant['nom'].'</p>';
    $affichage .= '<p>Adresse : '.$restaurant['adresse'].'</p>';
    $affichage .= '<p>Téléphone : '.$restaurant['telephone'].'</p>';
    $affichage .= '<p>Type de restaurant : '.$restaurant['type'].'</p>';
    $affichage .= '<p>Note : '.$restaurant['note'].'</p>';
    $affichage .= '<p>Avis : '.$restaurant['avis'].'</p>';



}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste_restaurants</title>
  </head>
  <body>
    <h1>Liste des restaurants</h1>

    <table class="table" border="1">
      <tr>
        <th>Nom</th>
        <th>Téléphone</th>
        <th>Autres infos</th>
      </tr>
      <?php echo $affichage ?>
    </table>

  </body>
</html>
