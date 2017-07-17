<?php

 try {
   $pdo = new PDO('mysql:host=localhost;dbname=mike', 'root' , '' , array(PDO :: ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
 } catch (PDOException $e) {

 }
if(!empty($_POST)){

  $request = "INSERT INTO `users`(`name`, `email`, `password`, `phone`) VALUES (:name, :email, :password, :phone)";
  $stmt = $pdo->prepare($request);
  $stmt->bindParam(':name',$_POST["name"]);
  $stmt->bindParam(':email',$_POST["email"]);
  $stmt->bindParam(':password',$_POST["password"]);
  $stmt->bindParam(':phone',$_POST["phone"]);
  $stmt->execute();

  $Mike = array("error"=>false, "id"=>$pdo->lastInsertId());
  echo json_encode($Mike); // permet de convertir un tableau php enun objet js




}
