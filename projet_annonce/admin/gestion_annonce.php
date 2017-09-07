<?php
require_once '../inc/init.inc.php';

// ----------------------------- TRAITEMENT -----------------------
// 1- Vérification que l'internaute est ADMIN :

if (!internauteEstConnecteEtEstAdmin()) {
	header('location:../connexion.php');
	exit();
}

// -------------------------Supression annonce -----------------------

if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
	$pdo->query("DELETE FROM annonce WHERE id_annonce = '$_GET[id_annonce]'");
	$contenu.= '<div class = "bg-success">L\'annonce a bien été suprimé !</div>';
	$_GET['action'] = 'affichage';
}

// 4- Enregistrement du produit en BDD :

if (!empty($_POST)) {
	$extensions = array(
		'.png',
		'.gif',
		'.jpg',
		'.jpeg'
	);
	$extension = strrchr($_FILES['photo']['name'], '.');
	$contenu = '';

	// debug($_POST);
	// ICI il faudrait mettre tous les contrôles sur le formulaire...

	if (strlen($_POST['titre']) < 2 || strlen($_POST['titre']) > 200) {
		$contenu.= '<div>Le titre doit comporter au moins 2 caractères</div>';
	}

	if (strlen($_POST['description_courte']) < 2 || strlen($_POST['description_courte']) > 100) {
		$contenu.= '<div>La description courte doit comporter au moins 2 caractères</div>';
	}

	if (strlen($_POST['description_longue']) < 10 || strlen($_POST['description_longue']) > 1000) {
		$contenu.= '<div>La description longue doit comporter au moins 10 caractères</div>';
	}

	if (!is_numeric($_POST['prix'])) {
		$contenu.= '<div>Le prix n\'est pas valide</div>';
	}

	if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
	{
		$contenu.= 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
	}

	if (strlen($_POST['pays']) < 2 || strlen($_POST['pays']) > 100) {
		$contenu.= '<div>Le pays n\'est pas valide</div>';
	}

	if (strlen($_POST['ville']) < 2 || strlen($_POST['ville']) > 100) {
		$contenu.= '<div>La ville n\'est pas valide</div>';
	}

	if (strlen($_POST['adresse']) < 2 || strlen($_POST['adresse']) > 100) {
		$contenu.= '<div>L\'adresse n\'est pas valide</div>';
	}

	if (!preg_match('#^[0-9]{5}$#', $_POST['cp'])) {
		$contenu.= '<div>Le code postal n\'est pas valide</div>';
	}

	$photo_bdd = ''; // représente le chemin de la photo du produit

	// 5- PHOTO :

	debug($_FILES);
	if (!empty($_FILES['photo']['name'])) {

		// si on a uploadé une photo :

		$nom_photo = $_POST['titre'] . '_' . $_FILES['photo']['name']; // on crée un nom unique pour nommer le fichier photo uploadé
		$photo_bdd = RACINE_SITE . 'photo/' . $nom_photo; // représente le chemin de la photo affichée sur le site et enregistrée en bdd
		$photo_physique = $_SERVER['DOCUMENT_ROOT'] . $photo_bdd;
		$photo_bdd; // représente le chemin complet depuis le localhost oû est enregistré le fichier photo physique sur le serveur. Ici $_SERVER['DOCUMENT_ROOT'] = localhost
		copy($_FILES['photo']['tmp_name'], $photo_physique); // enregistre le fichier photo qui est temporairement dans $_FILES['photo']['tmp_name'], dans le repertoire dont le chemin est $photo_physique
	}

	if (empty($contenu)) {
		foreach($_POST as $indice => $valeur) {
			$_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
		}

		$query = $pdo->prepare('REPLACE INTO annonce(id_annonce,titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp) VALUES(:id_annonce,:titre, :description_courte, :description_longue, :prix, :photo, :pays, :ville, :adresse, :cp)');
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
      $contenu.= "<div class = 'bg-success' >L'annonce a bien été enregistré' !</div>";
		}
		else {
			$contenu.= '<div>Erreur lors de l\'enregistrement</div>';
		}
	}

	// 9 suite- modification de la photo :

	if (isset($_GET['action']) && $_GET['action'] == 'modification') {

		// si nous sommes en modification d'un produit, nous mettons en BDD la valeur du champ 'photo actuelle' du formulaire

		$photo_bdd = $_POST['photo_actuelle'];
	}
}

// 4- suite :
// executeRequete("REPLACE INTO annonce (id_annonce, titre, description_courte, description_longue, prix, photo, pays, ville, adresse, cp)
// 								VALUES(:id_annonce, :titre, :description_courte, :description_longue, :prix, :photo, :pays, :ville, :adresse, :cp)",
// 								 array(':id_annonce'=> $_POST['id_annonce'],
// 							 	':titre'=> $_POST['titre'],
// 						 		':description_courte'=> $_POST['description_courte'],
// 					 			':description_longue'=> $_POST['description_longue'],
// 								':prix'=> $_POST['prix'],
// 								':photo'=> $photo_bdd ,
// 								':pays'=> $_POST['pays'],
// 								':ville'=> $_POST['ville'],
// 								':adresse'=> $_POST['adresse'],
// 								':cp'=> $_POST['cp'],
//
//
//
//               ));
// $contenu .= '<div class="bg-success"> L\'annonce a été enregistré.</div>';
// $_GET['action'] = 'affichage'; // pour déclencher l'affichage de la table HTML avec toutes les annonces
// }// fin du fichier if(!emty($_POST))
// 2- Liens affichage et ajout de l'annonce :

$contenu.= '<ul class="nav nav-tabs">
			 	<li><a href="?action=affichage">Affichage des annonces</a></li>
			 	<li><a href="?action=ajout">Ajout d\'une annonce</a></li>
			 </ul>';

// 6- Affichage des annonces dans une table HTML :

if (isset($_GET['action']) && $_GET['action'] == 'affichage') {

	// si l'affichage est demandée :

	$resultat = executeRequete("SELECT * FROM annonce"); // on sélectionne tous les produits
	$contenu.= '<h3> Affichage des annonces </h3>';
	$contenu.= 'Nombre d\'annonce dans la boutique : ' . $resultat->rowCount();
	$contenu.= '<table class="table">';

	// Entetes du tableau :

	$contenu.= '<tr>';
	$contenu.= '<th>id_annonce</th>
											<th>titre</th>
											<th>description_courte</th>
											<th>description_longue</th>
											<th>prix</th>
											<th>photo</th>
											<th>pays</th>
											<th>ville</th>
											<th>adresse</th>
											<th>cp</th>
											<th>membre_id</th>
											<th>photo_id</th>
                      <th>categorie_id</th>
                      <th>date_enregistrement</th>';
	$contenu.= '</tr>';

	// Les lignes du tableau :

	while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {

		// debug($ligne);

		$contenu.= '<tr>';
		foreach($ligne as $indice => $valeur) {
			if ($indice == 'photo') {

				// si nous sommes sur l'indice photo, on met une balise <img>

				$contenu.= '<td><img src="' . $valeur . '" alt ="" width="70" height="70" class="img-responsive"></td>';
			}
			else {
				$contenu.= '<td>' . $valeur . '</td>';
			}
		}

		$contenu.= '<td>
													<a href="?action=modification&id_annonce=' . $ligne['id_annonce'] . '">modifier</a> |
													<a href="?action=suppression&id_annonce=' . $ligne['id_annonce'] . '" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer cette annonce ?\'));" >supprimer</a>
										</td>';
		$contenu.= '</tr>';
	}

	$contenu.= '</table>';
}

// ----------------------------- AFFICHAGE -----------------------

require_once '../inc/haut.inc.php';

echo $contenu;

// 3- Formulaire HTML :

if (isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) {

	// 8- Modification d'une annonce existante

	if (isset($_GET['id_annonce'])) {

		// si on est en modification et qu'un id_annonce existe, alors on le sélectionne en BDD pour afficher ses infos dans le formulaire :

		$resultat = executeRequete("SELECT * FROM annonce WHERE id_annonce = :id_annonce", array(
			':id_annonce' => $_GET['id_annonce']
		));
		$annonce_actuel = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car qu'un seul produit
	}

?>
	<h3>Fomulaire de l'annonce</h3>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="id_annonce" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['id_annonce'];
	}
	else {
		echo 0;
	} ?>">

      <label for="titre">Titre</label><br />
  		<input type="text" name="titre" id="titre" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['titre'];
	} ?>"><br /><br />


		<label for="description_courte">Description courte</label><br />
		<input type="text" name="description_courte" id="description_courte" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['description_courte'];
	} ?>"><br /><br />


		<label for="description_longue">Description longue</label><br />
		<textarea id="description_longue" name="description_longue"> <?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['description_longue'];
	} ?> </textarea><br /><br />

		<label for="prix">Prix</label><br />
		<input type="text" name="prix" id="prix" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['prix'];
	} ?>"><br /><br />


		<label for="photo">Photo</label><br />
		<input type="file" id="photo" name="photo" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['photo'];
	} ?>"><br /><br /> <!-- va de paire avec l'attribut enctype de la balise <form> : permet d'uploader un fichier et de remplir la superglobale $_FILES -->
        <input type="hidden" id="photo" name="photo" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['photo'];
	} ?>"><br /><br />
			<!-- 9- Modification de la photo -->
			<?php

	// En cas de modification de produit, on affiche la photo actuelle :

	if (isset($annonce_actuel)) {
		echo '<i>Vous pouvez uploader une nouvelle photo</i><br />';
		echo '<img src="' . $annonce_actuel['photo'] . '" width="90" height="90"><br />';
		echo '<input type="hidden" name="photo_actuelle" value="' . $annonce_actuel['photo'] . '"><br />'; // ce champ permet de renseigner l'indice 'photo_actuelle' dans $_POST quand on valide le formulaire de modification
	} ?>

		<label for="pays">pays</label><br />
		<input type="text" name="pays" id="pays" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['pays'];
	} ?>"><br /><br />

		<label for="ville">Ville</label><br />
		<input type="text" name="ville" id="ville" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['ville'];
	} ?>"><br /><br />

    <label for="adresse">Adresse</label><br />
  	<input type="text" name="adresse" id="adresse" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['adresse'];
	} ?>"><br /><br />

    <label for="cp">Code Postal</label><br />
    <input type="text" name="cp" id="cp" value="<?php
	if (isset($annonce_actuel)) {
		echo $annonce_actuel['cp'];
	} ?>"><br /><br />

		<input type="submit" value="valider" class="btn">
	</form>
<?php
}

require_once '../inc/bas.inc.php';
