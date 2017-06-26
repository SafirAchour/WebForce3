<?php
// -----------------------------------
// Cas pratique : un espace de dialogue
// -----------------------------------

/* Objectif : créer un espace de dialogue de type avis ou livre d'or.

    Base de données : dialogue
    Table           : commentaire
    champs          : id_commentaire        INT(3) PK AI
                      pseudo                VARCHAR(20)
                      message               TEXT
                      date_enregistrement   DATETIME
*/

// Connexion à la bdd :
$pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// si le formulaire est posté
if(!empty($_POST)){
  // 3 - traitement contre les failles xss et les injections css : echapper les données.
  // Exemple de la faille CSS : <style>body{display:none}</style>
  // Exemple de faile XSS : <script>while(true){alert('vous etes bloqué');}</script>

  // Pour s'en prémunir :
  $_POST['pseudo'] = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
  $_POST['message'] = htmlspecialchars($_POST)['message'], ENT_QUOTES); // convertit les caractères speciaux (<, >, "",& et '') en entités HTML, ce qui permet de rendre inoffensive les balises HTML injectés dans le formulaire. On parle d'échappement des données.

  //Compléments :
  $_POST['message'] = strip_tags($_POST['message']); // supprime toutes les balises HTML contenues dans $_POST['message']

  // htmlentities() permet aussi de convertir en entités HTML les caractères spéciaux lorsqu'on fait un echo direct de données issues de l'internaute

  // 1- nous allons faire dans un premier temps une requête qui n'est pas protégée contre les injections et qui n'accepte pas les apostrophes :
  //$r = $pdo->query("INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')");

  // Nous avons fait l'injection SQL suivante dans le champ message : ok'); DELETE FROM commentaire; (
  // Elle a pour conséquence l'effacement de la table commentaire. On va pour se prémunir de ce type d'injection SQL, faire une requête préparée :

  $stmt = $pdo->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES(:pseudo, :message, NOW())");

  $stmt->bindParam(':pseudo', $_POST['pseudo'],PDO::PARAM_STR);
  $stmt->bindParam(':message', $_POST['message'],PDO::PARAM_STR);

  $stmt->execute();
  // l'injection SQL ne fonctionne plus car on a mis des marqueurs dans la requête plus des bindParam qui assainnissent les données en neutralisant les morceaux de code passé dans le champ message.
}

?>


<h2>Formulaire</h2>

<form class="" action="" method="post">

  <label for="pseudo">Pseudo</label>
  <input type="text" name="pseudo" value="pseudo">
  <br>

  <label for="message">Message</label>
  <textarea name="message" id="message" rows="8" cols="80"></textarea>
  <br>

  <input type="submit" name="envoi" value="envoyer">



</form>

<?php
// Affichage des messages postés :
$resultat = $pdo->query("SELECT pseudo, message, date_enregistrement FROM commentaire ORDER BY date_enregistrement DESC");
echo 'Nombre de commentaires : ' . $resultat->rowCount();

while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC)){
  echo '<div>';
    echo '<div> Pseudo : ' . $commentaire['pseudo'] . ', le ' . $commentaire['date_enregistrement'] . '</div>';
    echo '<div> Message : ' . $commentaire['message'] . '</div>';
  echo '</div><hr>';

}?>
