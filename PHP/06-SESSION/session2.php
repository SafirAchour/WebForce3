<?php

// Ouverture de la session en cours :
session_start(); // lorsque j'effectue un session_start, la session n'est pas recréée car elle existe déjà (elle a été créée dans le fichier session1.php)
echo 'La session est accessible dans tous les scripts du site, comme ici : ';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Conclusion : ce fichier n'a pas de lien avec session1.php, il n'y a pas d'inclusion , il pourrait etre dans n'importe quel dossier du site, s'appeler n'importe comment , et pourtant les infos du fichier de session restent accessible grâce à session_start.
 ?>
