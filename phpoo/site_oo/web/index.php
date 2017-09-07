<?php

session_start();
require __DIR__ . '/../vendor/PDOManager.php';
require __DIR__ . '/../src/Model/ProduitModel.php';
require __DIR__ . '/../src/Controller/ProduitController.php';


//Test de ProduitModel
// $pm = new ProduitModel;
// //$produits = $pm -> getAllProduits();
// //$produits = $pm -> getAllCategories();
// //$produits = $pm -> getAllProduitsByCategorie('haut');
// $produits = $pm -> getProduitsById(5);
//
//
// echo '<pre>';
// print_r($produits);
// echo '</pre>';


// TEST de ProduitController

$pc = new ProduitController;
$pc -> afficheAll();
