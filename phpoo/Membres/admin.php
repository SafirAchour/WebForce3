<?php

require_once 'membre.php';

class Admin extends Membre
{
    private $Login;
    
    public function getLogin() {
        return $this->firstName;
    }

    public function setLogin($value) { 
        $this->firstName = $value;
        return $this;
    }
   
    
}

