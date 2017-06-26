<?php
//----------------------
//COOKIE
//----------------------
 /* Définition : un cookie est un petit fichier (4 ko max) déposé par le serveur du site dans le navigateur de l'internaute et qui peut contenir des informations. Les cookies sont automatiquement envoyés au serveur web par le navigateur lorque l'internaute navigue dans les pages concernées par les cookies.

 PHP permet de récupérer très facilement les données contenues dans un cookie  : ses informations sont récupérées dans la superglobale $_COOKIE.

Précaution à prendre avec les cookies : étant sauvegardé sur le poste de l'internaute, un cookie peut etre potentiellement  détourné ou volé. On n'y stocke donc pas par précautions des données sensibles (mot de passe, références bancaires, panier d'achat...).
*/

//Application pratique : nous allons stocker la langue choisie par l'internaute dans un cookie afin de lui afficher le site dans cette langue à chaque visite :

// On determine une variable $langue :
if(isset($_GET['langue'])){
  //si on a cliqué sur un des liens :
  $langue = $_GET['langue'];
}elseif(isset($_COOKIE['langue'])){
  // si on a recu un cookie appelé "langue" :
  $langue = $_COOKIE['langue'];
}else{
  // Par défaut, la langue est le francais :
  $langue = 'fr';
}

// Création du COOKIE :
$un_an = 365 * 24 * 3600;  // variable qui représente un an  exprimé en secondes
setCookie('langue', $langue, time() + $un_an); // envoie un cookie dans le navigateur de l'internaute : setCookie('nom', 'valeur', 'date expiratien en timestamp')
// Pour rendre un cookie inactif, on lui met une date passée ou à 0, car il n'existe pas de fonction pour supprimer un cookie.

// Affichage de la langue :
echo 'Langue : ';
switch($langue){
  case 'fr' : echo 'francais';break;
  case 'es' : echo 'espagnol';break;
  case 'it' : echo 'italien';break;
  case 'en' : echo 'anglais';break;
  default   : echo 'francais';
}


//-----------------HTML ---------------------
?>
<h1>Votre langue : </h1>
<ul>
    <li><a href="?langue=fr">Francais</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=it">Italien</a></li>
    <li><a href="?langue=en">Anglais</a></li>
</ul>
