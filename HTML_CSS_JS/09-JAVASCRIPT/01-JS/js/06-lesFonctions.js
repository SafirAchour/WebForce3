/*------------------------------
      LES FONCTIONS           
--------------------------------*/

// -- Déclarer une fonction
// -- Cette fonction ne retourne aucune valeur

function DitBonjour() {
    //-- Lors de l'appel de la fonction, les instructions ci dessous seront exécutées
    alert("Bonjour !");
}

DitBonjour();

//-- Déclarer une fonction qui prend une variable en paramètre

function Bonjour(Prenom) {
    document.write("<p>Hello <strong>" + Prenom + "</strong> !</p>");
    
}

// -- Appeler / Utiliser une fonction avec un paramètre

Bonjour("Teva");

/*------------------------------
      EXERCICE :
      
      Créez une fonction permettant d'effectuer l'addition de deux nombres passés en paramètre.
--------------------------------*/

function addition(nb1, nb2){
    return nb1 + nb2;
    
   
}
 document.write("<p> "  + addition(10,5) + "</p>");
    
