<?php

 class ProduitController{
   private $model;

   public function __construct(){
     $this -> model = new ProduitModel;
   }

   public function getModel(){
     return $this -> model;
   }


   // Afficher tous les produits
   public function afficheAll(){
     // Objectif 1 : Récupérer les données dans la BDD :
     $produits = $this -> getModel() -> getAllProduits();
     $categories = $this -> getModel() -> getAllCategories();

    // Objectif 2 : Afficher la vu (boutique.php) :
    require __DIR__ . '/../View/haut.inc.php';
    require __DIR__ . '/../View/Produit/boutique.php';
    require __DIR__ . '/../View/bas.inc.php';


   }

   // Afficher les produits par catégorie
   public function afficheCategorie($categorie){

   }

   //Affiche UN produit
   public function affiche($id){

   }
 }
