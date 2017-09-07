<?php

class Chat
{

  private $prenom;
  private $age;
  private $couleur;
  private $sexe;
  private $race;




  public function setPrenom($value)
  {
    return $this -> prenom = $value;
  }

  public function setAge($value)
  {
    return $this -> age = $value;
  }

  public function setCouleur($value)
  {
    return $this -> couleur = $value;
  }

  public function setSexe($value)
  {
    return $this -> sexe = $value;
  }

  public function setRace($value)
  {
    return $this -> race = $value;

  }


//Partie Get

  public function getPrenom() {
    return $this -> prenom;
  }

  public function getAge() {
    return $this -> age;
  }

  public function getCouleur() {
    return $this -> couleur;
  }

  public function getSexe() {
    return $this -> sexe;
  }

  public function getRace() {
    return $this -> race;
  }


//Partie getinfo

  public function getInfos() {
    $table = "<table>";
    $table .= "<thead>";
    $table .= "<th>Prénom</th>";
    $table .= "<th>Age</th>";
    $table .= "<th>Couleur</th>";
    $table .= "<th>Sexe</th>";
    $table .= "<th>Race</th>";
    $table .= "</thead>";
    $table .= "<tbody>";
    $table .= "<tr>";
    $table .= "<td>" . $this->prenom . "</td>";
    $table .= "<td>" . $this->age . " ans</td>";
    $table .= "<td>" . $this->couleur . "</td>";
    $table .= "<td>" . $this->sexe . "</td>";
    $table .= "<td>" . $this->race . "</td>";
    $table .= "</tr>";
    $table .= "</tbody>";

    echo $table;
  }
}
