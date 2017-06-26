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

//--------------------------------Fonctions liées au panier -----------------------------------

// On crée le panier Vide :
function creationDuPanier(){
  if(!isset($_SESSION['panier'])){
    //si le panier n'existe pas, on le crée :
    $_SESSION['panier'] = array();
    $_SESSION['panier']['titre'] = array();
    $_SESSION['panier']['id_produit'] = array();
    $_SESSION['panier']['quantite'] = array();
    $_SESSION['panier']['prix'] = array();
  }
}

// Fonction pour ajouter un produit au panier :
function ajouterProduitDansPanier($titre, $id_produit, $quantite, $prix){
  creationDuPanier();

  $position_produit = array_search($id_produit,$_SESSION['panier']['id_produit']); //retourne un chiffre si le produit existe qui correspond à l'indice de celui-ci dans le panier ( 0 pour le premier indice). Si le produit n'est pas dans lepanier, array_search retourne false.

  if($position_produit === false){
    // Le produit n'est pas dans le panier, on l'y ajouter :
    $_SESSION['panier']['titre'][] = $titre;
    $_SESSION['panier']['id_produit'][] = $id_produit;
    $_SESSION['panier']['quantite'][] = $quantite;
    $_SESSION['panier']['prix'][] = $prix; // crochet vide pour ajouter le contenu de la variableà l'indice numérique suivant
  }else{
    // Sinon on ajoute la nouvelle quantité à la quantité existante dans le panier :
    $_SESSION['panier']['quantite'][$position_produit] += $quantite;
  }

}

// Calculer le montant total du panier :
function montantTotal(){
  $total = 0;
  // On parcourt le panier pour additionner les quantités fois les prix :
  for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++){
    $total += $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix'][$i];
  }

  return round($total, 2); //arrondi $total à 2 décimales
}

// Retirer un produit du panier :
function retirerProduit($id_produit){
  $position_produit = array_search($id_produit,$_SESSION['panier']['id_produit']); // retourne la position du produit dans le panier ou false si il n'y est pas
  if($position_produit !== false){
    array_splice($_SESSION['panier']['titre'], $position_produit, 1);
    array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
    array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
    array_splice($_SESSION['panier']['prix'], $position_produit, 1); // array_splice() coupe une tranche d'un array à partir de l'indice $position_produit et sur 1 indice
  }
}

// Fonction qui compte le nombre de produits différents dans le panier :
function quantiteProduit(){
  if(isset($_SESSION['panier'])){
    // si existe le panier :
    return count($_SESSION['panier']['id_produit']);
  }else {
    return 0;
  }
}
