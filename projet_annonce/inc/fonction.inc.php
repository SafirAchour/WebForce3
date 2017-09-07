
<?php

function debug($var){
  echo '<div style="background:orange; padding: 5px;">';
        echo '<pre>'; print_r($var); echo '</pre>';
  echo '</div>';
}

//-------------------- Fonctions membre ----------------------
function internauteEstConnecte(){
  if(isset($_SESSION['membre'])){
    // si il existe l'indice membre dans $_SESSION, c'est que le membre est passé par le formulaire de connexion avec les bons pseudo/mdp :
    return true;
  } else {
    return false;
  }
}

function internauteEstConnecteEtEstAdmin(){
  if(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1){
    // si l'internaute est connecté ET que son statut vaut 1, alors il est ADMIN :
    return true;
  }else {
    return false;
  }
  //return(internauteEstConnecte() && $_SESSION['membre']['statut'] == 1);
}

//-------------------------------------------------
function executeRequete($req, $param = array()){
  if(!empty($param)){
    // si j'ai recu des valeurs associées aux marqueurs, je fais un htmlspecialchars dessus pour les échapper :
    foreach($param as $indice => $valeurs){
      $param[$indice] = htmlspecialchars($valeurs, ENT_QUOTES); // évite les injections XSS et CSS en neutralisant les caractères > < "" '' et &
    }
  }
  global $pdo;  //permet d'avoir accès à la variables définie dans l'espace global ( dans init.inc.php)

  $r = $pdo->prepare($req); // on prepare la requete recue en argument

  $succes = $r->execute($param); // on exécute la requete en lui passant les paramètres contenus dans $param

  if(!$succes){
    // si la requete n'a pas fonctionné, execute renvoie false :
    die('Erreur sur la requete SQL'); //arrete le script et affiche le message
  }
  return $r; // on retourne un objet issu de la classe PDOStatement
}
