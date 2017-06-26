<?php
/*
Exercice 3 : « Et si on regardait un film ? »

Vous travaillez pour un cinéma et devez créer une base de données de film. Votre base de données s’appellera « exercice_3 ». Vous devrez ensuite créer un script qui permettra d’ajouter et d’afficher des films. Suivez les étapes.

Étape 1 :

Cette table, nommée “movies” sera composée des champs suivants :
 ● title ​(varchar)​ : le nom du film
 ● actors ​(varchar)​ : les noms d’acteurs
 ● director ​(varchar)​ : le nom du réalisateur
 ● producer ​(varchar)​ : le nom du producteur
 ● year_of_prod ​(year)​ : l’année de production
 ● language ​(varchar)​ : la langue du film
 ● category ​(enum)​ : la catégorie du film
 ● storyline ​(text)​ : le synopsis du film
 ● video ​(varchar) ​: le lien de la bande annonce du film

 N’oubliez pas de créer un ID pour chaque film et de l’auto-incrémenter.

*/
$contenu = '';

$category = array('horreur', 'drame', 'humour', 'action');

$langue = array('Francais','Anglais','Espagnol','Allemand');

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

var_dump($_POST);

/*Prérequis :
● Les champs “titre, nom du réalisateur, acteurs, producteur et synopsis” comporteront au minimum 5 caractères. ● Les champs : année de production, langue, category, seront obligatoirement un menu déroulant
● Le lien de la bande annonce sera obligatoirement une URL valide
● En cas d’erreurs de saisie, des messages d’erreurs seront affichés en rouge


Chaque film sera ajouté à la base de données créée. Un message de réussite confirmera l’ajout du film.
*/

if(!empty($_POST)){

	if (strlen($_POST['title']) < 5 ){
		$contenu .= '<div style="color:red">Le titre doit comporter au moins 5 caractères</div>';
	}

	if (strlen($_POST['actors']) < 5){
		$contenu .= '<div style="color:red">L\'acteur doit comporter au moins 5 caractères</div>';
	}

  if (strlen($_POST['producer']) < 5){
		$contenu .= '<div style="color:red">Le réalisateur doit comporter au moins 5 caractères</div>';
	}

  if (strlen($_POST['director']) < 5){
		$contenu .= '<div style="color:red">Le producteur doit comporter au moins 5 caractères</div>';
	}

  if (strlen($_POST['storyline']) < 5){
		$contenu .= '<div style="color:red">Le synopsis doit comporter au moins 5 caractères</div>';
	}

	if (!preg_match('#^[0-9]{4}$#', $_POST['year_of_prod'])){
		$contenu .= '<div style="color:red">L\'année de production n\'est pas valide</div>';
	}

	if (!in_array($_POST['category'], $category)){
		$contenu .= '<div style="color:red">La catégorie n\'est pas valide</div>';
	}

  if (!in_array($_POST['language'], $langue)){
		$contenu .= '<div style="color:red">La langue n\'est pas valide</div>';
	}

  if (!filter_var($_POST['video'], FILTER_VALIDATE_URL)){
		$contenu .= '<div style="color:red">L\'url de la video n\'est pas valide</div>';
	}

  if (empty($contenu)) {

    foreach($_POST as $indice => $valeur)
    {
      $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
    }


    $query = $pdo->prepare('INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES(:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)');
    $query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $query->bindParam(':actors', $_POST['actors'], PDO::PARAM_STR);
    $query->bindParam(':director', $_POST['director'], PDO::PARAM_STR);
    $query->bindParam(':producer', $_POST['producer'], PDO::PARAM_STR);
    $query->bindParam(':year_of_prod', $_POST['year_of_prod'], PDO::PARAM_STR);
    $query->bindParam(':language', $_POST['language'], PDO::PARAM_STR);
    $query->bindParam(':category', $_POST['category'], PDO::PARAM_STR);
    $query->bindParam(':storyline', $_POST['storyline'], PDO::PARAM_STR);
    $query->bindParam(':video', $_POST['video'], PDO::PARAM_STR);

    $succes = $query->execute();

    if ($succes) {
      $contenu .= '<div style="color:green">Le film a été enregistré avec succés<div>';
    } else {
      $contenu .= '<div style="color:red">Erreur lors de l\'enregistrement<div>';
    }

  }
}

 ?>

 <!-- Étape 2 :

 Créer un formulaire permettant d’ajouter un film et effectuer les vérifications nécessaires. -->

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>exercice 3</title>
   </head>
   <body>

     <h1> AJOUTER UN FILM </h1>
     <form method="post" action="">

   		<div class="input-group">
   			<label for="title">Titre </label>
   			<input type="text" name="title" >
   		</div><br>

   		<div class="input-group">
   			<label for="actors ">Acteurs </label>
   			<input type="text" name="actors" >
   		</div><br>

   		<div class="input-group">
   			<label for="director">Réalisateur </label>
   			<input type="text" name="director" >
   		</div><br>

      <div class="input-group">
   			<label for="producer">Producteur </label>
   			<input type="text" name="producer" >
   		</div><br>

   		<div class="input-group">
   			<label for="year_of_prod">Année de production </label>

   			<select name="year_of_prod" >
   				<?php
   				for($i=date('Y'); $i>=date('Y')-100; $i--) {
   					echo '<option value="'. $i .'">'. $i .'</option>';
   				}
   				?>

   			</select>
   		</div><br>

      <div class="input-group">
   			<label for="language">Langue </label>
        <select name="language" >
   				<?php
   				foreach($langue as $key => $value){
   					echo '<option value="'. $value .'">'. $value .'</option>';
   				}
   				?>

   			</select>
   		</div><br>

   		<div class="input-group">
   			<label for="type_contact">Type de contact </label>

   			<select name="category" >
   				<?php
   				foreach($category as $key => $value){
   					echo '<option value="'. $value .'">'. $value .'</option>';
   				}
   				?>

   			</select>
   		</div><br>

   		<div class="input-group">
   			<label for="storyline">Synopsis </label>
   			<textarea name="storyline" rows="8" cols="80"></textarea>
   		</div><br>

      <div class="input-group">
   			<label for="video">Vidéo </label>
   			<input type="text" name="video" >
   		</div><br>

   		<button type="submit">Envoyer</button><br>

      <?php
      echo $contenu ?>


   </body>
 </html>
