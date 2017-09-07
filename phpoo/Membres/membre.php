<?php

class Membre 
{
    private $firstName;
    private $lastName;
    private $age;
    
   
    
    public function __construct($firstName) {
        $this->setFirstName($firstName);
        
    }
    
    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($value) { 
        $this->firstName = $value;
        return $this;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($value) { 
        $this->lastName = $value;
        return $this;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
        return $this;
    }

}
