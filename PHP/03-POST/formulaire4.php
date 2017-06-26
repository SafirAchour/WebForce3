<?php

echo '<pre>'; var_dump($_POST); echo '</pre>';

if(!empty($_POST)){
// Si le formulaire n'est pas vide c'est qu'il est soumis :
if (empty($_POST['pseudo'])) {
  echo '<p> Veuillez bien remplir le champs pseudo';
}else {
  echo 'pseudo : ' . $_POST['pseudo'] . '<br>';
  echo 'Email : ' . $_POST['mail'] . '<br>';
  }

}

 ?>
