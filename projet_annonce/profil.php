<?php
require_once'inc/init.inc.php';

//----------------------traitement---------------------
//Redirection si visiteur non connecté : 
if(!internauteEstConnecte()){
    // on le renvoie vers la page de connexion : 
    header('location:connexion.php'); // on envoie une redirection vers la page de connexion
    exit(); // on quitte le script
}

//prépare le profil à afficher :
debug($_SESSION);
if(!empty($_SESSION)){
    
 $contenu .='<h1>Bonjour ' . $_SESSION['membre']['pseudo'] . '</h1>';
 $contenu .='<p>Votre email: ' . $_SESSION['membre']['email'] . '</p>'; 
 
}








//--------------Affichage----------------------------
require_once'inc/haut.inc.php';
echo $contenu;


require_once'inc/bas.inc.php';