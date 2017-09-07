<?php

require_once './animal.php';

class Chien extends Animal
{
    // surcharge de l'attribut $espece dans Chat
    protected $espece='chien';
    
    public function displayEspece(){
        echo 'je suis un ' . $this->espece;
    }
    
    public function getColor(){
        parent::displayColor();
    }
    public function crier(){
        echo 'Ouaf';
    }
}

