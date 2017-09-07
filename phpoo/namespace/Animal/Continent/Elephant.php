<?php

namespace Animal\Continent\Africa;
use Animal\Element as abstractElephant;

// pour ne pas avoir à préfixer une classe sans namespace 
// d'un \ à l'intérieur d'un namespace,opn peut utiliser un use .

use Tourist;
class Elephant extends AbstractElephant
{
 public function getEarsSize() 
 {
     return 'big';
 }
 public function beSeen()
 {
     $tourist = new Tourist();
     $tourist->WatcElephant('africa');
 }
}

