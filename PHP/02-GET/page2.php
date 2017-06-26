<h1>Page détail des articles</h1>

<?php
//------------------------------------
// La superglobale $_GET
// -----------------------------------
// $_GET représente l'URL : il s'agit d'une superglobale et comme toutes les superglobales, il s'agit d'un array.

// Superglobale signifie que cette variable est disponible dans tous les contextes du script, y compris dansd les fonctions, et qu'il n'est pas nécessaire de faire global $_GET.

// Les informations transitent dans l'URL de la manière suivante : ?indice=valeur&indice2=valeur2

// La superglobale $_GET transforme ces informations passées dans l'URL en cet array : $_GET = array('indice' => 'valeur', 'indice2' => 'valeurs2' )

echo '<pre>'; var_dump($_GET); echo '</pre>';

// On met une condition qui verifie qu'on a bien les infos dans l'URL :
if(isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])){
// si existe les indices ' article', 'couleur', et 'prix' :
  echo '<p> Article : ' . $_GET ['article'] . '</p>';
  echo '<p> Couleur : ' . $_GET ['couleur'] . '</p>';
  echo "<p> Prix : " . $_GET ['prix'] . '</p>';

}else {
  echo '<p> CE PRODUIT N\'EXISTE PAS </p>';
}
