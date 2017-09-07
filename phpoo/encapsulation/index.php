<?php

require 'User.php';

// créer l'objet :
$user = new User();
var_dump($user->getFirstName());
//echo $user->firstName;

//appel au setter pour modifier la valeur de l'attribut

$user
        ->setFirstName('Teva')
        ->setLastName('Natchitz')
        ->setAge(20);

// appel au getter pour accéder à la valeur de l'attribut
echo'<hr>';
echo $user->getFirstName();
echo'<br>';
echo $user->getLastName();
echo'<br>';
echo $user->getAge();
echo'<hr>';
