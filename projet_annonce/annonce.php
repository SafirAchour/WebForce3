<?php
require_once('inc/init.inc.php');

//----------------- TRAITEMENT -----------------
// 1- Affichage des catégories :
//$categories = executeRequete("SELECT DISTINCT titre FROM categorie");





//----------------- AFFICHAGE -----------------
require_once('inc/haut.inc.php');
?>
  <div class="row">
    <div class="col-md-3">
      <form class="annonce" action="annonce.php" method="post">
        <h2>Les annonces</h2>
        <div class="form-group">
          <label for="id_categorie">Catégorie</label>
          <br>
          <select class="" name="id_categorie">
            <?php
            $resultat = $pdo->query("SELECT titre FROM categorie");
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){

              foreach($ligne as $information){
                echo '<option>'. $information .'</option>';
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="id_categorie">Ville</label>
          <br>
          <select class="" name="id_annonce">
            <?php
            $resultat = $pdo->query("SELECT ville FROM annonce");
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){

              foreach($ligne as $information){
                echo '<option>'. $information .'</option>';
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="id_categorie">Membre</label>
          <br>
          <select class="" name="id_membre">
            <?php
            $resultat = $pdo->query("SELECT pseudo FROM membre");
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){

              foreach($ligne as $information){
                echo '<option>'. $information .'</option>';
              }
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="prix">Prix max</label><br>
          <input type="input" name="prix" value="">
        </div>

        <div class="form-group">
          <label for="prix">Prix min</label><br>
          <input type="input" name="prix" value="">
        </div>
      </form>
    </div>
    <div class="col-md-9">
      <div class="row">

      </div>
    </div>
  </div>


<?php
require_once('inc/bas.inc.php');
