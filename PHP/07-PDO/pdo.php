<?php
// ----------------------------------------------
// PDO
// ----------------------------------------------
// L'extension PDO, pour PHP Data Objects, définit une interface pour accéder à une base de données depuis PHP.

//-----------------------------------------------
echo '<h3>01. PDO : connexion </h3>';
//-----------------------------------------------

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// $pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la base de données.
// Les arguments : 1) driver mysql + serveur + base de données - 2) pseudo - 3) mdp - 4) option 1 pour générer l'affichage des erreurs, option 2 definit le jeu de caractères des échanges avec la bdd.

echo '<pre>'; print_r($pdo); echo '</pre>'; // on voit qu'il s'agit d'un objet issu de la classe PDO
echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>'; // affiche les méthodes de l'objet issue de la classe PDO

//-----------------------------------------------
echo '<h3>02. exec avec INSERT, UPDATE et DELETE </h3>';
//-----------------------------------------------

//$resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('test', 'test', 'm', 'test', '2016-02-08', 500 )");

/* exec() est utilisé pour la formulation de requêtes ne retournant pas de jeu de résultats : INSERT, UPDATE et DELETE.

    valeur de retour :
      Succés : un integer (= le nombres de lignes affectées)
      Echec : false
*/
//echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
//echo "Dernier id généré lors de l'INSERT : " . $pdo->lastInsertId() . '<br>';

// -------------
// Exemple avec UPDATE :
$resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");

echo "Nombre d'enregistrements affectés par l'UPDATE :$resultat <br>";



//-----------------------------------------------
echo '<h3>03. query avec SELECT + FETCH_ASSOC </h3>';
//-----------------------------------------------

$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");
/* Au contraire de l''exec', 'query' est utilisé avec les requêtes retournant un ou plusieurs résultats : SELECT.

    Valeur de retour :
      Succès : on obtient un nouvel objet issue de la classe prédéfinie PDOStatement
      Echec : false

    Notez que query peut etre utilisé avec INSERT, UPDATE et DELETE.
*/
echo '<pre>'; print_r($result); echo '</pre>'; // affiche les propriétés de l'objet PDOStatement
echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>'; // affiche les méthodes issues de la classe PDOStatement

// $result est le resultat de la requete sous une forme inexploitable directement : il faut donc le transformer par la méthode fetch() :


$employe = $result->fetch(PDO::FETCH_ASSOC); // La méthode fetch() avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $result en un ARRAY associatif ($employe) indexé avec le nom des champs de la requete.
echo '<pre>'; print_r($employe); echo '</pre>';
echo"Je suis $employe[prenom] $employe[nom] du service $employe[service] <br>"; // on peut afficher le contenu de l'array avec des crochets. Remarque : ici notre array est dans des guillemets, il perd donc ses quotes autour des indices

// On peut transformer $result selon l'une des autres méthodes suivantes :
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");
$employe = $result->fetch(PDO::FETCH_NUM); // on obtient un array indéxé numériquement
echo '<pre>'; print_r($employe); echo '</pre>';
echo $employe[1];  // on affiche le prénom en passant par l'indice 1 correspondant

//---
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");
$employe = $result->fetch(); // fetch() sans argument fait un mélange de FETCH_ASSOC et de FETCH_NUM
echo '<pre>'; print_r($employe); echo '</pre>';
echo $employe['prenom'] . '<br>';
echo $employe[1] . '<br>';

//---
$result = $pdo->query("SELECT * FROM employes WHERE prenom = 'thomas'");
$employe = $result->fetch(PDO::FETCH_OBJ); // retourne un objet avec le nom des champs de la requete comme propriétés (=attributs) publiques
echo '<pre>'; print_r($employe); echo '</pre>';
echo $employe->prenom . '<br>'; // comme employe est un objet, on utilise la notation avec flèche ->

// Remarque : il faut choisir l'un des traitements fetch que vous voulez effectuer, car vous ne pouvez pas en faire plusieurs sur le meme résultat.

echo '<hr>';

//------------
// Exercice : afficher le service de l'employé dont l'id-employes est 417
$result = $pdo->query("SELECT * FROM employes WHERE id_employes = 417");
$employe = $result->fetch(PDO::FETCH_NUM); // retourne un objet avec le nom des champs de la requete comme propriétés (=attributs) publiques
echo '<pre>'; print_r($employe); echo '</pre>';
echo $employe[4] . '<br>';

//-----------------------------------------------
echo '<h3>04. while et  FETCH_ASSOC </h3>';
//-----------------------------------------------

// Jusqu'ici il n'y avait qu'un seul résultat dans l'objet PDOStatement issu de la requete. Pour traiter plusieurs résultats, il nous faut faire une boucle while.

$resultat = $pdo->query("SELECT * FROM employes");

echo 'Nombre d\'employes dans la requete : ' . $resultat->rowCount() .'<br>'; // retourne le nombre de lignes dans la requête

echo '<pre>'; print_r($resultat); echo '</pre>';

while($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){// fetch retourne la ligne suivante du jeu de résultat contenu dans $resultat et un array associatif. La boucle while permet de parcourir tous les résultats en faisant avancer le curseur dans la table. La boucle s'arrete à la fin des résultats.
  //echo '<pre>'; print_r($contenu); echo '</pre>';
  echo'<div>';
    echo $contenu['id_employes'] . '<br>';
    echo $contenu['prenom'] . '<br>';
    echo $contenu['service'] . '<br>';
  echo'---------------------------</div>';
}

//Remarque : il n'y a pas un seul array avec tous les enregistrement, mais un array par employé.
// Quand vous avez potentiellement plusieurs résultats : vous faites une boucle while, sinon, vous faites un seul fetch.

//-----------------------------------------------
echo '<h3>05. FETCH_ALL </h3>';
//-----------------------------------------------
$resultat = $pdo->query("SELECT * FROM employes");
$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC); // FETCH_ALL retourne toutes les lignes de résultats dans un tableau multidimensionnel : on a 1 array associatif à chaque indice numérique représentant un employe. Marche aussi avec PDO::FETCH_NUM.

echo '<pre>'; print_r($donnees); echo '</pre>';

// Pour afficher tout le contenu de cet array multidimensionnel, nous faisons des boucles foreach imbriquées :
echo '<hr>';

foreach($donnees as $employe){ // $employe est un sous array associatif contenant les infos de l'employé
  //echo '<pre>'; print_r($employe); echo '</pre>';
  foreach($employe as $indice => $valeur){// cette boucle parcourt toutes les infos du sous array représentant 1 employé
    echo $indice . ' : ' .$valeur .'<br>';
  }
  echo '--------------------------------<br>'; // pour séparer chaque employé à l'affichage
}

//-----------------------------------------------
echo '<h3>06. Exercice </h3>';
//-----------------------------------------------

// Affichez la liste des différents services, en la mettant dans une liste <ul> <li>.

$resultat = $pdo->query("SELECT * FROM employes GROUP BY service");
echo'<ul>';
while($listeservices = $resultat->fetch(PDO::FETCH_ASSOC)){

    echo '<li>';
      echo $listeservices['service'] . '<br>';
    echo '</li>';

}
echo'---------------------------</ul>';

//-----------------------------------------------
echo '<h3>07. Tables HTML </h3>';
//-----------------------------------------------

$resultat = $pdo->query("SELECT * FROM employes");
echo '<table border ="1">';
    // Affichage de la ligne des entêtes :
    echo '<tr>';
        for($i = 0; $i < $resultat->columnCount(); $i++){ // fait autant de tours de boucle qu'il y a de colonnes dans le jeu de resultat
          //echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre>'; // on voit que getColumnMeta() retourne un array qui contient l'indice name avec le nom du champ de la table sql
          $colonne = $resultat->getColumnMeta($i); //$colonne est donc un array avec dedans l'indice name
          echo '<th>' . $colonne['name'] . '</th>'; // on affiche le nom de la colonne

        }

    echo'</tr>';

    // Affichage des lignes de la table :
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
      echo'<tr>';
          foreach($ligne as $informations) {
            echo '<td>' . $informations . '</td>';
          }
      echo '</tr>';
    }


echo '</table>';

//-----------------------------------------------
echo '<h3>08. PDO prepare, bindParam, execute </h3>';
//-----------------------------------------------
$nom = 'sennard';

// préparation de la requete :
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); //Prepare la requete avec un marqueur nominatif qui attend une valeur.

//2- on lie le marqueur a une variable :
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR);// bindParam recoit exclusivement une variable vers laquelle pointe le marqueur : ici on lie le marqueur nom a la variable $nom. ainsi, si le contenu de la variable change , la valeur du marqueur changera automatiquement lorsqu'on refera un execute. On a aussi les constantes PDO::PARAM_INT et PDO::PARAM_BOOL.

//3- On execute la requête :
$resultat->execute();

//4- fetch :
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, '-'); // implode() transforme le contenu d'un array en string.

/*
Prepare() permet de préparer la requete mais ne l'execute pas.
execute() permet d'exécuter une requete preparee.

Valeur de retour :
  prepare() renvoie toujours un objet PDOStatement
  execute() :
        succes : True
        echec  : false

Les requetes préparées sont préconisées si vous éxecutez plusieurs fois la meme requete , et ainsi vouloir eviter de répéter le cycle complet : analyse/interpretation/execution.

Les requetes préparées sont aussi utilisées pour assainir les données (prepare + bindParam + execute).

*/

// Si on change le contenu de la variable $nom, il n'est pas nécessaire de refaire un bindParam avant un nouvel execute() :
$nom = 'durand';
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, '-'); // on obtient bien les infos de Durand



//-----------------------------------------------
echo '<h3>09. PDO prepare, bindValue, execute </h3>';
//-----------------------------------------------

// 1- préparation de la requête :
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");

// 2- Lie le marqueur à une valeur :
$resultat->bindValue(':nom', 'thoyer', PDO::PARAM_STR);

// 3- On éxécute la requête :
$resultat->execute();

// 4- fetch :
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, '-');

//-----------------------------------------------
echo '<h3>10. Exercice </h3>';
//-----------------------------------------------

// Affichez dans une liste <ul><li> le titre des livres empruntés par Chloé en utilisant une requête préparée.

$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$prenom = 'Chloe';

$resultat = $pdo->prepare("SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = :nom))");

$resultat->bindParam(':nom', $prenom , PDO::PARAM_STR);

$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, '-');

// on aurais pu mettre une boucle while :
/* while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){
echo '<li>' . $donnees['titre'] . '</li>';
}
*/

//-----------------------------------------------
echo '<h3>11. points complémentaires </h3>';
//-----------------------------------------------
echo '<strong>Le marqueur "?" </strong>';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ? "); // on prépare la requête sans les variables que l'on remplace par des marqueurs "?"

$resultat->execute(array('durand', 'damien'));

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); // pas de boucle while car je suis certain qu'il n'y a qu'un résultat dans la requete. $donnees est un array associatif.

echo '<br>' . $donnees ['service'] . '<br>';

echo '<strong> Execute sans bindParam : </strong>';
$resultat =$pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom");
$resultat->execute(array(':nom' => 'durand', ':prenom' => 'damien')); // nous associons les marqueurs nominatifs dans un array associatif passé en argument de execute. Notez que vous n'êtes pas obligé de mettre les : avant le nom des marqueurs dans l'array en argument de execute.

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);

echo '<br>SERVICE : ' . $donnees ['service'] . '<br>';
