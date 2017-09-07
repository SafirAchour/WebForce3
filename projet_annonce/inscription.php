<?php

//--------------------TRAITEMENT-------------------------
require_once('inc/init.inc.php');
$inscription = false; // pour ne pas afficher le formulaire une fois le membre inscrit
debug($_POST);
// Traitement du formulaire :
if(!empty($_POST)){
  if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20){
      $contenu .='<div class="bg-danger">Le pseudo doit contenir entre 4 et 20 caractéres.</div>';
  }
  if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20){
      $contenu .='<div class="bg-danger">Le mot de passe doit contenir entre 4 et 20 caractéres.</div>';

  }
  if(strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20){
      $contenu .='<div class="bg-danger">Le nom doit contenir entre 2 et 20 caractéres.</div>';

  }
   if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20){
      $contenu .='<div class="bg-danger">Le prenom doit contenir entre 2 et 20 caractéres.</div>';
  }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $contenu .='<div class="bg-danger">Email invalide </div>';

  } //filter_var permet de valider un format d'email avec l'option FILTER_VALIDATE_EMAIL.on peut aussi  valider les url avec FILTER_VALIDATE_URL.

    if(!isset($_POST['civilite']) || ($_POST['civilite'] != 'm' && $_POST['civilite'] != 'f' )){
        $contenu .='<div class="bg-danger"> Erreur de civilité </div>';
  }

        if(!preg_match('#^[0-9]{10}$#' , $_POST['telephone'])){
            $contenu .='<div class="bg-danger">Le téléphone n\'est pas valide </div>';

  }
  //


    /*// la fonction preg_match vérifie que la chaîne de caracteres contenu dans le code postal correspond à l'expression réguliére.En cas de sucés,elle renvoie 1,sinon elle renvoie 0.
  l'expression réguliére utilisée :
    -Elle est encadrée par des # (délimiteurs)
    -le ^ signifie "commence par ce qui suit"
    -le $ signifie "se termine par ce qui précéde"
    -entre crochets on définit l'interval de lettres ou de chiffres autorisés
    -entre accolades on quantifie le nombre de chiffres souhaités,ici 5 obligatoirement (quantificateur)

 */

   // si pas d'erreur sur le formulaire, on vérifie que le pseudo est unique :
    if(empty($contenu)){
        //si $contenu est vide,il n'y a pas d'erreur
        $membre = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");



        if($membre->rowCount() > 0){
            // si la requête renvoie des lignes c'est que le pseudo existe !
            $contenu .='<div class="bg-danger">Pseudo indisponible, veuillez en choisir un autre ! </div>'; //
        }else {

            // si la requête ne contient pas de ligne, le pseudo est disponible : on l'insére en bdd :
            //$_POST['mdp'] = md5($_POST['mdp']); // on encrypte le mot de passe avec la fonction prédéfinie md5

            /*$r = $pdo->prepare('INSERT INTO membre(pseudo, mdp, nom, prenom, telephone, email, civilite, date_enregistrement) VALUES (:pseudo, :mdp, :nom, :prenom, :telephone, :email, :civilite, :date_enregistrement)',array(':pseudo' =>$_POST['pseudo'],':mdp' =>$_POST['mdp'],':nom' =>$_POST['nom'],':prenom' =>$_POST['prenom'],':telephone' =>$_POST['telephone'],':email' =>$_POST['email'],':civilite' =>$_POST['civilite'],':date_enregistrement' =>$_POST['date_enregistrement']));*/

            $r = $pdo->prepare("INSERT INTO membre(pseudo, mdp, nom, prenom, telephone, email, civilite, date_enregistrement) VALUES (:pseudo, :mdp, :nom, :prenom, :telephone, :email, :civilite, NOW())");

            $r->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $r->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
            $r->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
            $r->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $r->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_INT);
            $r->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
            $r->bindValue(':civilite', $_POST['civilite'], PDO::PARAM_STR);



            $r->execute();



            $contenu .='<div class="alert alert-success" role="alert"> vous êtes inscrit sur notre site. <a href="connexion.php">Cliquez ici pour vous connecter </a></div>';
            $inscription = true; // pour ne plus afficher le formulaire
        }

    }
}




//------------------AFFICHAGE----------------------------
require_once('inc/haut.inc.php');
echo $contenu; // pour affiche les messages d'erreur
if(!$inscription) :
// si membre inscrit, on affiche le formulaire :
?>
<form method="post" action="">

   <legend> Formulaire d'inscription</legend>
    <label for ="pseudo">Pseudo</label><br>
    <input type="text" name="pseudo" id="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'];?>"><br><br>

    <label for ="mdp">Mot de passe</label><br>
    <input type="password" name="mdp" id="mdp" value="<?php if(isset($_POST['mdp'])) echo $_POST['mdp'];?>"><br><br>

    <label for ="nom">Nom</label><br>
    <input type="text" name="nom" id="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'];?>"><br><br>

    <label for ="prenom">Prénom</label><br>
    <input type="text" name="prenom" id="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'];?>"><br><br>

    <label for ="telephone">Téléphone</label><br>
    <input type="text" name="telephone" id="telephone" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone'];?>"><br><br>

    <label for ="email">Email</label><br>
    <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><br><br>


    <label>Civilité</label><br>
    <input type="radio" name="civilite" id="homme" value="m" checked> Homme
    <input type="radio" name="civilite" id="femme" value="f" <?php if(isset($_POST['civilite']) &&  $_POST['civilite'] == 'f') echo 'checked';?>> Femme <br><br>


    


    <input type="submit" name="inscription" value="s'inscrire"><br><br>


</form>





<?php
endif;
require_once('inc/bas.inc.php');
