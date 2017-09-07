<?php

class ProduitModel{
  private $db;
  public function __construct(){
    $this -> db = PDOManager::getInstance() -> getPdo();
  }
  public function getDb(){
    return $this -> db;
  }

  //---------------

  // SELECT * FROM produit
  public function getAllProduits(){
    $requete = " SELECT * FROM produit";
    $resultat = $this -> getDb() -> query($requete);

    $produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
    if(!$produits){
      return false;
    }else{
      return $produits;
    }
  }

  //SELECT DISTINCT categorie FROM produit
  public function getAllCategories(){
    $requete = "SELECT DISTINCT categorie FROM produit";
    $resultat = $this -> getDb() -> query($requete);

    $categories = $resultat -> fetchAll(PDO::FETCH_ASSOC);
    if(!$categories){
      return false;
    }else{
      return $categories;
    }

  }

  // SELECT * FROM produit WHERE categorie = xxxxx
  public function getAllProduitsByCategorie($categorie){
    $requete = "SELECT * FROM produit WHERE categorie = :categorie";
    $resultat = $this -> getDb() -> prepare($requete);
    $resultat -> bindParam(':categorie', $categorie, PDO::PARAM_STR);
    $resultat -> execute();

    $produits = $resultat -> fetchAll(PDO::FETCH_ASSOC);
    if(!$produits){
      return false;
    }else{
      return $produits;
    }

  }

  // SELECT produit FROM produit WHERE id_produit = xxxxx
  public function getProduitsById($id){
    $requete = "SELECT * FROM produit WHERE id_produit = :id_produit";
    $resultat = $this -> getDb() -> prepare($requete);
    $resultat -> bindParam(':id_produit', $id, PDO::PARAM_INT);
    $resultat -> execute();

    $produit = $resultat -> fetch(PDO::FETCH_ASSOC);
    if(!$produit){
      return false;
    }else{
      return $produit;
    }
  }
}
