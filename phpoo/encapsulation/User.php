<?php

class User 
{
    private $firstName;
    private $lastName;
    private $age;
    
    /*
     * * construction de la classe 
     * si cette classe existe, elle est appelée à l'instanciation (création de l'objet).
     */
    
    public function __construct($firstName = null) {// cette fonction prédéfine permet de figer la modification .
        $this->setFirstName($firstName);
        
    }
    /*
     * Getter de l'attribut firstName, ne fait que retourner la valeur de l'attribut.
     */
    public function getFirstName()
    {
      return $this->firstName;   
    }
    public function setFirstName($value) // le setter de l'attribut firstName,permet de modifier la valeur de l'attribut.
    {
       $this->firstName = $value;
       return $this;
    }
    public function getLastName()
    {
      return $this->lastName;   
    }
    public function setLastName($value) // le setter de l'attribut firstName,permet de modifier la valeur de l'attribut.
    {
       $this->lastName = $value;
       return $this;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this-> age =$age;
        return $this;
    }
}


