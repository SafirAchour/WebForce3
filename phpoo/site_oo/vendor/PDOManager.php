<?php


// Cette classe est un singleton. Le singleton  est un design pattern, qui permet de créer une classe qui ne sera instanciable qu'une seule fois.
// L'intéret est d'avoir un seul objet qui récupère une seule connexion à la BDD.

class PDOManager
{
  private static $instance = NULL; // Contiendra un objet de la classe PDOManager.
  private $pdo; // Contiendra mon objet PDO 5 CONNEXION à la BDD)

  private function __construct(){}
  private function __clone(){}

  public static function getInstance(){
    if(is_null(self::$instance)){
      self::$instance = new PDOManager;
    }
    return self::$instance;
  }
  public function getPDO(){
    require __DIR__ . '/../app/parameters.php';
    // require C:\wampp\htdocs\phpoo\site_oo\vendor

    $this->pdo = new PDO('mysql:host=' . $parameters['host'] . ';dbname=' . $parameters['dbname'], $parameters['login'], $parameters['password']);
    return $this -> pdo;
  }
}

//$pdomanager = new PDOManager;   Impossible d'instancier un objet comme on le fait d'habitude.

// $pdomanager = PDOManager::getInstance();
//
// $resultat = $pdomanager -> getPdo() -> query("SELECT * FROM produit");
// $produits = $resultat -> fetchAll (PDO::FETCH_ASSOC);
//
// echo '<pre>';
// print_r($produits);
// echo'</pre>';
