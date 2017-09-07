<?php
require_once('inc/init.inc.php');


// -------------------------------------------------TRAITEMENT----------------------------------------------
// 1- Affichage des catégories :
$categories = executeRequete("SELECT DISTINCT categorie FROM annonce");

$contenu_gauche .= '<p class="lead">Catégories</p>';
$contenu_gauche .= '<div class="list-group">';
        $contenu_gauche .= '<a href=""> Tous </a>';
        $contenu_gauche .= '<a href="?categorie=all" class="list-group-item"> Tous </a>';

        while($cat = $categories-> fetch(PDO::FETCH_ASSOC)){ // boucle while car plusieurs catégories
          debug($cat);
          $contenu_gauche .= '<a href="?categorie='.$cat['categorie'].'" class="list-group-item"> '.$cat['categorie'].' </a>';

        }
$contenu_gauche .= '</div>';

// 2- Affichage des produits en fonction de la catégorie choisie :

if(isset($_GET['categorie']) && $_GET['categorie'] != 'all'){
  $donnees = executeRequete("SELECT * FROM annonce WHERE categorie = :categorie", array(':categorie' => $_GET['categorie'])); // on selectionne tous les produits de la catégorie choisie
}else{
  $donnees = executeRequete("SELECT * FROM annonce"); // on selectionne tous les produits


}
while($annonce = $donnees->fetch(PDO::FETCH_ASSOC)){
  $contenu_droite .= '<div class="col-sm-4">';
        $contenu_droite .= '<div class="thumbnail">';
          $contenu_droite .= '<a href="fiche_annonce.php?id_annonce='. $annonce['id_annonce'] .'"><img src="'. $annonce['photo'] .'" width="130" height="100"></a>';
          $contenu_droite .= '<div class="caption">';
                $contenu_droite .= '<h4 class="pull-right">'. $annonce['prix'].' €</h4>';
                $contenu_droite .= '<h4 >'. $annonce['titre'].'</h4>';
                $contenu_droite .= '<h4 >'. $annonce['description'].'</h4>';

          $contenu_droite .= '</div>';
        $contenu_droite .= '</div>';
  $contenu_droite .= '</div>';
}











// -------------------------------------------------AFFICHAGE----------------------------------------------
require_once('inc/haut.inc.php');
 ?>

 <div class="row">
   <div class="col-md-3">
     <?php echo $contenu_gauche; ?>
   </div>
   <div class="col_md_9">
     <div class="row">
       <?php echo $contenu_droite; ?>
     </div>
   </div>
 </div>

 <?php
 require_once('inc/bas.inc.php');
