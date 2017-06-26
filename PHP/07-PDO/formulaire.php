<?php
 // -------------
 // Exercice :
 /* Créer un formulaire qui permet d'enregistrer un nouvel employé dans la base de données "entreprise", en écrivant le code suivant :

 1- Création du formulaire HTML
 2- Connexion à la bdd
 3- Lorsque le formulaire est posté, insertion des données du formulaire dans la base avec une requête préparée
 4- Afficher un message "L'employé a bien été ajouté."

 */
 $message = ''; //variable pour afficher les messages.


$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// 3-
if(!empty($_POST)){

  if(strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 20) $message .= 'le prénom doit comporter entre 3 et 20 caractère <br>';
  echo 'Prénom : ' . $_POST['prenom'] . '<br>';

  if(strlen($_POST['nom']) < 3 || strlen($_POST['nom']) > 20) $message .= 'le nom doit comporter entre 3 et 20 caractère <br>';
  //echo 'Nom : ' . $_POST['nom'] . '<br>';

  if($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f') $message .= 'le sexe n\'a pas été coché <br>';
  //echo 'Sexe : ' . $_POST['sexe'] . '<br>';


  //echo 'Date d\'embauche : ' . $_POST['date_embauche'] . '<br>';

  if(strlen($_POST['service']) < 3 || strlen($_POST['service']) > 20) $message .= 'le service doit comporter entre 3 et 20 caractère <br>';
  //echo 'Service : ' . $_POST['service'] . '<br>';

  if(!is_numeric($_POST['salaire'])  || $_POST['salaire'] <= 0) $message .= 'le salaire doit être un nombre supérieur à 0 <br>';
  //echo 'Salaire : ' . $_POST['salaire'] . '<br>';

  // Controle de la date :
  function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);  // crée un objet date au format indiqué dans $format, ou bien retourne false si la date fournie ne respecte pas le format fournie
    if($d && $d->format($format) == $date){ // la date est correct si $d vaut true ( sinon c'est que date ne respect pas le format fourni) ET que l'objet $d formaté est identique à la date fournie ( sinon c'est que l'on a donné par exemple 1975-02-30 au lieu de 1975-03-02)
      return true;
    } else {
      return false;
    }
  }

  if(!validateDate($_POST['date_embauche'])) $message .= 'date incorrecte';



  if(empty($message)){
    // Requêtes préparés :
    $resultat = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom, :nom , :sexe, :service, :date_embauche, :salaire )"); // les marqueurs s'écrivent avec : collés au nom du marqueur ET sans les quotes

    $resultat->bindValue(':prenom',$_POST['prenom'], PDO::PARAM_STR);
    $resultat->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat->bindValue(':sexe', $_POST['sexe'], PDO::PARAM_STR);
    $resultat->bindValue(':service', $_POST['service'], PDO::PARAM_STR);
    $resultat->bindValue(':date_embauche', $_POST['date_embauche'], PDO::PARAM_STR);
    $resultat->bindValue(':salaire', $_POST['salaire'], PDO::PARAM_STR);

    //3- On execute la requête :
    $resultat->execute();

    if($resultat->execute()){
      echo " <strong style = 'color:red'>L'employé a bien été ajouté.</strong>";
    }
  }

}else {
  echo " <strong style = 'color:red'>Veuillez remplir tous les champs </strong>";
}






?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Exercice ajout dans un Formulaire</title>
  </head>
  <body>
    <h1>AJOUT DANS LE FORMULAIRE</h1>
    <?php echo $message; ?>
    <form class="" action="" method="post">
      <label for="prenom">Prénom : </label>
      <input type="text" name="prenom" value="">
      <br>
      <label for="nom">Nom : </label>
      <input type="text" name="nom" value="">
      <br>
      <label for="sexe">Sexe : </label>
      homme <input type="radio" name="sexe" value="m" checked>
      femme <input type="radio" name="sexe" value="f">
      <br>
      <label for="embauche">Date d'embauche : </label>
      <input type="text" name="date_embauche" value="AAAA-MM-JJ">
      <br>
      <label for="service">Service : </label>
      <input type="text" name="service" value="">
      <br>
      <label for="salaire">Salaire : </label>
      <input type="text" name="salaire" value="">
      <br>
      <input type="submit" name="validation" value="Envoyer">
    </form>

  </body>
</html>
