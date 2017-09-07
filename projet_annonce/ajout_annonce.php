<?php
require_once 'inc/init.inc.php';






$pdo = new PDO('mysql:host=localhost;dbname=annonces', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

var_dump($_POST);

if(!empty($_POST)){

	$extensions = array('.png', '.gif', '.jpg', '.jpeg');

	$extension = strrchr($_FILES['photo']['name'], '.');


	$contenu = '';

	if (strlen($_POST['titre']) < 2 || strlen($_POST['titre']) > 200){
		$contenu .= '<div>Le titre doit comporter au moins 2 caractères</div>';
	}

	if (strlen($_POST['description_courte']) < 2 || strlen($_POST['description_courte']) > 100){
		$contenu .= '<div>La description courte doit comporter au moins 2 caractères</div>';
	}

	if (strlen($_POST['description_longue']) < 10 || strlen($_POST['description_longue']) > 1000){
		$contenu .= '<div>La description longue doit comporter au moins 10 caractères</div>';
	}

	if (!is_numeric($_POST['prix'])){
		$contenu .= '<div>Le prix n\'est pas valide</div>';
	}

	if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
	 }


	if (strlen($_POST['pays']) < 2 || strlen($_POST['pays']) > 100){
		$contenu .= '<div>Le pays n\'est pas valide</div>';
	}

	if (strlen($_POST['ville']) < 2 || strlen($_POST['ville']) > 100){
		$contenu .= '<div>La ville n\'est pas valide</div>';
	}

	if (strlen($_POST['adresse']) < 2 || strlen($_POST['adresse']) > 100){
		$contenu .= '<div>L\'adresse n\'est pas valide</div>';
	}


	if (!preg_match('#^[0-9]{5}$#', $_POST['cp'])){
		$contenu .= '<div>Le code postal n\'est pas valide</div>';
	}




	$photo_bdd = ''; // représente le chemin de la photo du produit

  // 5- PHOTO :
	debug($_FILES);
	if(!empty($_FILES['photo']['name'])){
		// si on a uploadé une photo :
		$nom_photo = $_POST['titre'] . '_' . $_FILES['photo']['name']; // on crée un nom unique pour nommer le fichier photo uploadé

		$photo_bdd = RACINE_SITE . 'photo/' . $nom_photo;  // représente le chemin de la photo affichée sur le site et enregistrée en bdd

		$photo_physique = $_SERVER['DOCUMENT_ROOT'] . $photo_bdd;


	 	$photo_bdd; // représente le chemin complet depuis le localhost oû est enregistré le fichier photo physique sur le serveur. Ici $_SERVER['DOCUMENT_ROOT'] = localhost

		copy($_FILES['photo']['tmp_name'], $photo_physique);   // enregistre le fichier photo qui est temporairement dans $_FILES['photo']['tmp_name'], dans le repertoire dont le chemin est $photo_physique

	}


	if (empty($contenu)) {

		foreach($_POST as $indice => $valeur)
		{
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}


		$query = $pdo->prepare('INSERT INTO annonce (id_annonce, titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp) VALUES(:id_annonce, :titre, :description_courte, :description_longue, :prix, :photo, :pays, :ville, :adresse, :cp)');
		$query->bindParam(':id_annonce', $_POST['id_annonce'], PDO::PARAM_STR);
		$query->bindParam(':titre', $_POST['titre'], PDO::PARAM_STR);
		$query->bindParam(':description_courte', $_POST['description_courte'], PDO::PARAM_STR);
		$query->bindParam(':description_longue', $_POST['description_longue'], PDO::PARAM_STR);
		$query->bindParam(':prix', $_POST['prix'], PDO::PARAM_INT);
		$query->bindParam(':photo', $photo_bdd, PDO::PARAM_STR);
		$query->bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);
		$query->bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
		$query->bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
		$query->bindParam(':cp', $_POST['cp'], PDO::PARAM_STR);

		$succes = $query->execute();

		if ($succes) {
			$contenu .= '<div class = "bg-success">L\'annonce a été enregistré avec succés</div>';
		} else {
			$contenu .= '<div>Erreur lors de l\'enregistrement</div>';
		}

	}
}


require_once 'inc/haut.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une annonce</title>
</head>
<body>

	<h1>Ajouter une annonce</h1>

	<?php  echo $contenu; ?>

	<form method="post" enctype="multipart/form-data" action="">

		<div class="form-group">
			<label for="titre">Titre</label><br>
			<input type="text" name="titre" id="titre">
		</div>

		<div class="form-group">
			<label for="description_courte">Description courte</label><br>
			<input type="text" name="description_courte" id="description_courte">
		</div>

		<div class="form-group">
			<label for="description_longue">Description longue</label><br>
			<textarea type="text" name="description_longue" id="description_longue"></textarea>
		</div>

		<div class="form-group" >
			<label for="prix">Prix</label><br>
			<input type="text" name="prix" id="prix">
		</div>

		<div class="form-group">
			<label for="photo">Photo</label><br>
			<input type="file" id="photo" name="photo" value="">
		</div>


		<div class="form-group">
			<label for="pays">Pays</label><br>
			<input type="text" name="pays" id="pays">
		</div>

		<div class="form-group">
			<label for="ville">Ville</label><br>
			<input type="text" name="ville" id="ville">
		</div>

		<div class="form-group">
			<label for="adresse">Adresse</label><br>
			<input type="text" name="adresse" id="adresse">
		</div>

		<div class="form-group">
			<label for="cp">Code postal</label><br>
			<input type="text" name="cp" id="cp">
		</div>

		<button type="submit">Envoyer</button>

	</form>


</body>
</html>
<?php
require_once 'inc/bas.inc.php';
