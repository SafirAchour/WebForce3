<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=voiture', 'root', '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
  );
} catch (Exception $e) {
  die('Erreur : ' . $e -> getMessage());
}

//Recuperation des données
$ab = array(
  "marque" => $_POST['marque'],
  "modele" => $_POST['modele'],
  "years" => $_POST['years'],
  "couleur" => $_POST['couleur']
);


$insertAutoBdd = $bdd -> prepare('INSERT INTO nouvelle_voiture (marque, modele, years, couleur)
VALUES (:marque, :modele, :years, :couleur)');

$verficiation = $insertAutoBdd -> execute(array(
  "marque" => $ab['marque'],
  "modele" => $ab['modele'],
  "years" => $ab['years'],
  "couleur" => $ab['couleur']
));



if ($verficiation) {


  header('Content-Type: application/json');

  
  echo json_encode(array(
    "success" => true
  ));
}
