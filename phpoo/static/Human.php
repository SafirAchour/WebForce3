<?php

class Human
{
    const NB_LEGS = 2; // constante de  la classe
    // attribut static,appartient  à la classe et non à l'objet
    
    public static $nbInstances = 0;
    
    public function __construct()
    {
        self::$nbInstances++;   
    }
    public function sayHello()
    {
        echo 'hello';
    }
}