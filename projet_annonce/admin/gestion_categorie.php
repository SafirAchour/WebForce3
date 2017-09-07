<?php
require_once '../inc/init.inc.php';
// TRAITEMENT

$contenu = '';


$pdo = new PDO('mysql:host=localhost;dbname=annonces', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (!empty($_POST)) {
  $resultat = $pdo->prepare("INSERT INTO categorie(titre,motscles) VALUES (:titre, :motscles)");

  $resultat->bindParam(':titre', $_POST['titre']);
  $resultat->bindParam(':motscles', $_POST['motscles']);
  $resultat->execute();
}







// AFFICHAGE
require_once '../inc/haut.inc.php';
echo $contenu;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Annonceo.fr</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Gestion des catégories</h1>
        <?php
        $resultat = $pdo->query("SELECT * FROM categorie");
        echo '<table class="table">';
          // Affichage de la ligne des entêtes :
          echo '<tr>';
            for($i = 0; $i < $resultat->columnCount(); $i++){ // fait autant de tours de boucle qu'il y a de colonnes dans le jeu de resultat
              // echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre>'; // on voit que GetColumnMeta() retourne un array qui contient l'indice name avec les nom du champ de la table sql
              $colonne = $resultat->getColumnMeta($i); // $colonne est donc un array avec dedans l'indice name
              echo '<th>' . $colonne['name'] . '</th>'; // on affiche le nom de la colonne
            }
          echo '</ tr>';
          //Affichage des lignes de la table :
          while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';
              foreach($ligne as $information){
                echo '<td>'. $information .'</td>';
              }
            echo '</tr>';
          }
        echo '</table>';

         ?>
    <form class="categorie" action="gestion_categorie.php" method="post">
      <div class="form-group">
        <label for="titre">Titre</label>
        <br>
        <input type="text" name="titre" placeholder="Titre de la catégorie" value="">
      </div>
      <div class="form-group">
        <label for="motscles">Description Courte</label>
        <br>
        <input type="text" name="motscles" placeholder="Description courte de votre annonce" value="">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>
</body>
</html>
<?php
require_once '../inc/bas.inc.php';
