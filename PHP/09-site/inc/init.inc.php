<?php
/* Le fichier init.inc.php sera inclus dans tous les scripts (hors les fichiers .inc eux-mêmes) pour initialiser les éléments suivants :
 - connection à la BDD
 - création ou ouverture de session
 - définir le chemin du site
 - et inclure le fichier fonction.inc.php
*/

// Connection à la BDD :
$pdo = new PDO('mysql:host=localhost;dbname=site', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Session :
session_start();       //crée ou ouvre une session sur le serveur

//Définition du chemin du site :
define('RACINE_SITE', '/WebForce3/PHP/09-site/'); //indique le dossier dans lequel se trouve les sources du site dans 'localhost'

//Variables d'affichage de contenus :
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

// Inclusion des fonctions :
require_once('fonction.inc.php'); // on inclut ce fichier ic, ainsi il sera automatiquement inclus dans tous les scripts du site
