<?php

$i = 0;

$j = 0;
// $tronc = "^";
$z = 0;

// $j = 1;
// while($j < 2){
//
//   echo "^" ;
//   $j++;
//
// }
while($j < 5){
  $feuilles = '^';
  echo '<p>' . $feuilles . '</p>' ;
  $feuilles .= '^';
  $i=0;
  $j++;


while($i < 5 ){
  echo '<p>' . $feuilles . '</p>' ;
  $feuilles .= '^';

  $i++;
  while($z < 5){
    echo '<p>' . $feuilles . '</p>' ;
    $feuilles .= '^';
    // $tronc[2] ='x';

    $z++;
  }
}
}




 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Formulaire Sapin Askii</title>
   </head>
   <body>
     <?php
     $feuilles = '^';
     for($j = 0; $j < 4; $j++){
       for($i = 0; $i < 4; $i++){
         echo "<p>" . $feuilles . "</p>";
         $feuilles .= "^";
       }
       $feuilles = substr($feuilles,2);
     } ?>
     <h1>Formulaire exo</h1>
     <form method="post" action="" >
       <label for="sapin">NombresColonnesSapin</label>
       <br>
       <input type="text" name="sapin" value="">
       <br>
       <input type="submit" name="validation" value="envoyer">
     </form>
   </body>
 </html>
