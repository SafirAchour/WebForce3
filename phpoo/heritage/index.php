<?php

require 'chat.php';

$chat = new Chat();

echo $chat->identifier();
echo'<br>';
echo $chat->getEspece();
echo'<br>';
echo $chat->crier();
echo'<br>';
echo $chat->ronronner();
echo'<hr>';

require 'chien.php';

$chien = new Chien();

echo $chien->identifier();
echo'<br>';
echo $chien->displayEspece();
echo'<br>';
echo $chien->crier();
echo'<hr>';
