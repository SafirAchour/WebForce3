<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
*/

$pdo = new PDO('mysql:host=localhost;dbname=contacts', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  $affichage = '';

  $resultat =$pdo->query("SELECT * FROM contact");

  while($info = $resultat->fetch(PDO::FETCH_ASSOC)){

      echo '<tr>';
        $affichage .= '<td>'.$info['nom'].'</td>';
        $affichage .= '<td>'.$info['prenom'].'</td>';
        $affichage .= '<td>'.$info['telephone'].'</td>' ;
        $affichage .= '<td>
                <a href="?id_contact='.$info['id_contact'].'">Autres Infos</a>
              </td>';
      echo '</tr>';
  }

  if(isset($_GET['id_contact'])){

    $query = $pdo->prepare("SELECT * FROM contact WHERE id_contact = :id_contact");
    $query->bindParam(':id_contact', $_GET['id_contact'],PDO::PARAM_STR);
    $query->execute();

    $contact = $query->fetch(PDO::FETCH_ASSOC);


      $affichage .= '<p>Nom : '.$contact['nom'].'</p>';
      $affichage .= '<p>Prénom : '.$contact['prenom'].'</p>';
      $affichage .= '<p>Téléphone : '.$contact['telephone'].'</p>';
      $affichage .= '<p>Année de rencontre : '.$contact['annee_rencontre'].'</p>';
      $affichage .= '<p>Email : '.$contact['email'].'</p>';
      $affichage .= '<p>Type de contact : '.$contact['type_contact'].'</p>';



  }



?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>liste_contact</title>
  </head>
  <body>

    <h1>Listes des contacts</h1>

    <table class="table" border="2">
      <tr class="info">
          <th>nom</th>
          <th>prénom</th>
          <th>téléphone</th>
          <th>autres infos</th>
      </tr>
        <?php echo $affichage; ?>
    </table>




  </body>
</html>
