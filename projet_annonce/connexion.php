<?php
require_once'inc/init.inc.php';

//-------------------------Traitement------------------------------
//Déconnexion de linternaute à sa demande :
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
   session_destroy(); // rappel : cette instruction est éxecutée à la fin du script  
}

// Internaute est déja connecté :
if(internauteEstConnecte()){
    // on le renvoie vers la page de profil : 
    header('location:profil.php'); // on envoie une redirection vers la page profil
    exit(); // on quitte le script
 }


//-------------Traitement du formulaire :
if($_POST){
    // si le formulaire est soumis:
    // contrôle du formulaire :
    if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) $contenu.='<div class="bg-danger">Le pseudo est requis.</div>';
    if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) $contenu.='<div class="bg-danger">Le mot de passe est requis.</div>';
    if(empty($contenu)){ // si $contenu est vide c'est qu'il n'y a pas d'erreur.
        
        //$mdp = md5($_POST['mdp']); // on crypte le mdp pour le comparer à celui de la BDD.
        
        $r = $pdo->prepare("SELECT * FROM membre WHERE mdp = :mdp AND pseudo = :pseudo");
        
        $r->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $r->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
        
        $r->execute();
        if($r->rowCount() != 0){// $mdp remplace par ca ... ($mdp = md5($_POST['mdp']);)
          // si il y a une ligne dans le resultat de la requete, alors le membre est bien inscrit avec les bons login et mdp
            
          $membre = $r->fetch(PDO::FETCH_ASSOC);// pas de while car il n'y a qu'un seul membre possédant les login/mdp correctes.
          //debug($membre); 
        
        $_SESSION['membre'] = $membre; // nous créons une session "membre" avec les éléments provennant de la bdd.
        //debug($_SESSION);
        header('location:profil.php'); // le membre étant connecté, on l 'envoie vers son profil
            exit();
    
    }else {
        $contenu .='<div class="bg-danger">Erreur sur les identifiants.</div>'; 
    }
 }
}




//---------------------------Affichage----------------------------
require_once'inc/haut.inc.php';
echo $contenu;
?>
<h3>Veuillez renseigner vos identifiants pour vous connecter</h3>
<form method="post" action="">
   <label for="pseudo">Pseudo</label><br>
   <input type="text" name="pseudo" id="pseudo"><br><br>
    
   <label for="mdp">Mot de passe</label><br>
   <input type="password" name="mdp" id="mdp"><br><br>
   
   <input type="submit" value="se connecter" class="btn">
   
</form>



<?php
require_once'inc/bas.inc.php';