<?php
require_once '../inc/init.inc.php';

//----------------------------- TRAITEMENT -----------------------
// 1- Vérification que l'internaute est ADMIN :
if(!internauteEstConnecteEtEstAdmin()){
	header('location:../connexion.php');
	exit();
}

// 7- Suppression du produit :
if(isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_produit'])){
	// si on a passé l'action suppression dans l'url :

	// On sélectionne la photo en base pour pouvoir supprimer le fichier physique :
	$resultat = executeRequete("SELECT photo FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

	$produit_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC); //array associatif dont le nom de l'indice correspond au champ présent dans le SELECT de la requete ci-dessus
	$chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo']; // chemin complet de la photo a supprimer dans le dossier photo

	if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)){
		// si le fichier existe bien, on le supprime :
		unlink($chemin_photo_a_supprimer); // supprime le fichier indiqué
	}

	executeRequete("DELETE FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

	$contenu .= '<div class="bg-success">Le produit a bien été supprimé !</div>';

	$_GET['action'] = 'affichage'; // pour réafficher le tableau HTML sans le produit supprimé

}

// 4- Enregistrement du produit en BDD :
if(!empty($_POST)){
	//debug($_POST);
	// ICI il faudrait mettre tous les contrôles sur le formulaire...

	$photo_bdd = ''; // représente le chemin de la photo du produit

	// 9 suite- modification de la photo :
	if(isset($_GET['action']) && $_GET['action'] == 'modification'){
		// si nous sommes en modification d'un produit, nous mettons en BDD la valeur du champ 'photo actuelle' du formulaire
	$photo_bdd = $_POST['photo_actuelle'];
	}

	// 5- PHOTO :
	debug($_FILES);
	if(!empty($_FILES['photo']['name'])){
		// si on a uploadé une photo :
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name']; // on crée un nom unique pour nommer le fichier photo uploadé

		$photo_bdd = RACINE_SITE . 'photo/' . $nom_photo;  // représente le chemin de la photo affichée sur le site et enregistrée en bdd

		$photo_physique = $_SERVER['DOCUMENT_ROOT'] .
	 	$photo_bdd; // représente le chemin complet depuis le localhost oû est enregistré le fichier photo physique sur le serveur. Ici $_SERVER['DOCUMENT_ROOT'] = localhost

		copy($_FILES['photo']['tmp_name'], $photo_physique); // enregistre le fichier photo qui est temporairement dans $_FILES['photo']['tmp_name'], dans le repertoire dont le chemin est $photo_physique

	}

	// 4- suite :
	executeRequete("REPLACE INTO produit (id_produit, reference, categorie, titre, description, couleur, taille, public, photo, prix, stock)
									VALUES(:id_produit, :reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)",
									 array(':id_produit'=> $_POST['id_produit'],
								 	':reference'=> $_POST['reference'],
							 		':categorie'=> $_POST['categorie'],
						 			':titre'=> $_POST['titre'],
									':description'=> $_POST['description'],
									':couleur'=> $_POST['couleur'],
									':taille'=> $_POST['taille'],
									':public'=> $_POST['public'],
									':photo'=> $photo_bdd,
									':prix'=> $_POST['prix'],
									':stock'=> $_POST['stock']));

$contenu .= '<div class="bg-success"> Le produit a été enregistré.</div>';
$_GET['action'] = 'affichage'; // pour déclencher l'affichage de la table HTML avec tous les produits
}// fin du fichier if(!emty($_POST))



// 2- Liens affichage et ajout de produit :
$contenu .= '<ul class="nav nav-tabs">
			 	<li><a href="?action=affichage">Affichage des produits</a></li>
			 	<li><a href="?action=ajout">Ajout de produit</a></li>
			 </ul>';

// 6- Affichage des produits dans une table HTML :
if(isset($_GET['action']) && $_GET['action'] == 'affichage'){
	// si l'affichage est demandée :
	$resultat = executeRequete("SELECT * FROM produit"); // on sélectionne tous les produits

	$contenu .= '<h3> Affichage des produits </h3>';
	$contenu .= 'Nombre de produits dans la boutique : ' .$resultat->rowCount();

	$contenu .= '<table class="table">';
			//Entetes du tableau :
			$contenu .= '<tr>';
					$contenu .= '<th>id_produit</th>
											<th>référence</th>
											<th>catégorie</th>
											<th>titre</th>
											<th>description</th>
											<th>couleur</th>
											<th>taille</th>
											<th>public</th>
											<th>photo</th>
											<th>prix</th>
											<th>stock</th>
											<th>action</th>';
			$contenu .= '</tr>';

			// Les lignes du tableau :

			while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
				//debug($ligne);
				$contenu .= '<tr>';

							foreach($ligne as $indice => $valeur){
								if($indice == 'photo'){
									// si nous sommes sur l'indice photo, on met une balise <img>
									$contenu .= '<td><img src="'.$valeur.'" alt ="" width="70" height="70" class="img-responsive"></td>';
								} else {
									$contenu .= '<td>'.$valeur.'</td>';
								}
				}
				$contenu .= '<td>
													<a href="?action=modification&id_produit=' . $ligne['id_produit'] .'">modifier</a> |
													<a href="?action=suppression&id_produit=' . $ligne['id_produit'] .'" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce produit ?\'));" >supprimer</a>
										</td>';

				$contenu .= '</tr>';
			}


	$contenu .= '</table>';
}








//----------------------------- AFFICHAGE -----------------------
require_once '../inc/haut.inc.php';
echo $contenu;

// 3- Formulaire HTML :
if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) :

		// 8- Modification d'un produit existant
		if(isset($_GET['id_produit'])){
			// si on est en modification et qu'un id_produit existe, alors on le sélectionne en BDD pour afficher ses infos dans le formulaire :
			$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array (':id_produit' => $_GET['id_produit']));

			$produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car qu'un seul produit
		}
?>
	<h3>Fomulaire de produit</h3>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="id_produit" value="<?php if(isset($produit_actuel)){
			echo $produit_actuel['id_produit']; }else{ echo 0;}?>">

		<label for="reference">Référence</label><br>
		<input type="text" name="reference" id="reference" value="<?php if(isset($produit_actuel)){
			echo $produit_actuel['reference']; }?>"><br><br>

		<label for="categorie">Catégorie</label><br>
		<input type="text" name="categorie" id="categorie" value="<?php if(isset($produit_actuel)){
			echo $produit_actuel['categorie']; }?>"><br><br>

		<label for="titre">Titre</label><br>
		<input type="text" name="titre" id="titre" value="<?php if(isset($produit_actuel)){
			echo $produit_actuel['titre']; }?>"><br><br>

		<label for="description">Description</label><br>
		<textarea id="description" name="description"> <?php if(isset($produit_actuel)){
			echo $produit_actuel['description']; }?> </textarea><br><br>

		<label for="couleur">Couleur</label><br>
		<input type="text" name="couleur" id="couleur" value="<?php if(isset($produit_actuel)){
			echo $produit_actuel['couleur']; }?>"><br><br>

		<label for="taille">Taille</label><br>
		<select name="taille" id="taille">
			<option value="S" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 'S') echo 'selected';?> >S</option>
			<option value="M" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 'M') echo 'selected';?>>M</option>
			<option value="L" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 'L') echo 'selected';?>>L</option>
			<option value="XL" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 'XL') echo 'selected';?>>XL</option>
		</select><br><br>

		<label>Public</label><br>
		<input type="radio" name="public" id="homme" value="m" checked><label for="homme">Homme</label>
		<input type="radio" name="public" id="femme" value="f" <?php if(isset($produit_actuel) && $produit_actuel['public'] == 'f') echo 'checked';?>><label for="femme">Femme</label>
		<input type="radio" name="public" id="mixte" value="mixte" <?php if(isset($produit_actuel) && $produit_actuel['public'] == 'mixte') echo 'checked';?>><label for="mixte">Mixte</label><br><br>

		<label for="photo">Photo</label><br>
		<input type="file" id="photo" name="photo" value=""><br><br> <!-- va de paire avec l'attribut enctype de la balise <form> : permet d'uploader un fichier et de remplir la superglobale $_FILES -->
			<!-- 9- Modification de la photo -->
			<?php
			// En cas de modification de produit, on affiche la photo actuelle :
			if(isset($produit_actuel)){
				echo '<i>Vous pouvez uploader une nouvelle photo</i><br>';
				echo '<img src="'. $produit_actuel['photo'] .'" width="90" height="90"><br>';
				echo '<input type="hidden" name="photo_actuelle" value="'. $produit_actuel['photo'].'"><br>'; // ce champ permet de renseigner l'indice 'photo_actuelle' dans $_POST quand on valide le formulaire de modification
			} ?>

		<label for="prix">Prix</label><br>
		<input type="text" name="prix" id="prix" value="<?php if(isset($produit_actuel)){
			echo $produit_actuel['prix']; }?>"><br><br>

		<label for="stock">Stock</label><br>
		<input type="text" name="stock" id="stock" value="<?php if(isset($produit_actuel)){
			echo $produit_actuel['stock']; }?>"><br><br>

		<input type="submit" value="valider" class="btn">
	</form>
<?php
endif;
require_once '../inc/bas.inc.php';
