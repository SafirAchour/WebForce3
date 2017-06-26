<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

	<title>Ma Boutique</title>

    <!-- Bootstrap Core CSS -->
   <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/bootstrap.min.css'; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/shop-homepage.css'; ?>" rel="stylesheet">

	<!-- AJOUTER LE LIEN CSS SUIVANT POUR LE DETAIL PRODUIT-->
<link rel="stylesheet" href="<?php echo RACINE_SITE . 'inc/css/portfolio-item.css'; ?>" rel="stylesheet">

	<!-- jQuery -->
<script src="<?php echo RACINE_SITE . 'inc/js/jquery.js'; ?>"> </script>


    <!-- Bootstrap Core JavaScript -->
<script src="<?php echo RACINE_SITE . 'inc/js/bootstrap.min.js'; ?>"> </script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

			<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- La marque -->
        <a class="navbar-brand" href="<?php echo RACINE_SITE . 'boutique.php'; ?>"> MA BOUTIQUE </a>


		   </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                 	<!-- le menu de navigation -->
                  <?php
                  echo '<li> <a href="' .RACINE_SITE. 'boutique.php"> Boutique </a></li>';
                  if(internauteEstConnecte()){
                    // si internaute est connecté :
                  echo '<li><a href ="'. RACINE_SITE .'profil.php"> Profil </a></li>';
                  echo '<li><a href ="'. RACINE_SITE .'connexion.php?action=deconnexion"> Se déconnecter </a></li>';
                } else {
                  // Visiteur non connecté :
                  echo '<li><a href ="'. RACINE_SITE .'inscription.php"> Inscription </a></li>';
                  echo '<li><a href ="'. RACINE_SITE .'connexion.php?action=connection"> Connexion </a></li>';
                }
                echo '<li><a href ="'. RACINE_SITE .'panier.php?"> Panier('.quantiteProduit().') </a></li>';

                if(internauteEstConnecteEtEstAdmin()){
                  // Pour l'admin, on affiche les liens vers le back-office :
                  echo '<li class="dropdown">';
                      echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"> BACK OFFICE </a>';
                        echo '<ul class="dropdown-menu">';
                        echo '<li><a href="'.RACINE_SITE.'admin/gestion_boutique.php"> Gestion de la boutique </a></li>';
                        echo '<li><a href="'.RACINE_SITE.'admin/gestion_commande.php"> Gestion des commandes </a></li>';
                        echo '<li><a href="'.RACINE_SITE.'admin/gestion_boutique.php"> Gestion des membres </a></li>';
                        echo '</ul>';
                    echo '</li>';

                }


                  ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" style="min-height: 80vh;">
