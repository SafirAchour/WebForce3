//-- Déclarer un Tableau Numérique
var monTableau = [];
var myArray = new Array;

//-- Affecter des Valeurs à un tableau Numérique

myArray[0]="John";
myArray[1]="Rudy";
myArray[2]="Teva";
myArray[3]="Carole";

//-- Afficher le contenu de mon Tableau Numérique dans la console.
console.log(myArray[2]); //-- Teva
console.log(myArray[0]); //-- John
console.log(myArray); //-- Affiche toutes les données

// Déclarer et affecter des valeurs à un tableaux numérique

var NosPrenoms = ["Nabila","Karim","Johrdane","Hanane"];
console.log(NosPrenoms);
console.log(typeof NosPrenoms);

// Déclarer et affecter des valeurs à un objet (Pas de tableaux associatif en JS)

var Coordonnee = {
    "prenom" : "Teva",
    "nom"    : "Natchitz",
    "age"    : 27
    
}

console.log(Coordonnee);
console.log(typeof Coordonnee);

// -- Comment créer et affecter des valeurs à un Tableau de 2 dimensions.

// -- Ici, il s'agit de tableaux Numériques

var listeDeNoms     = ["LIEGEARD","NOUEL","ISOLA"];
var listeDePrenoms  = ["Hugo","Rodrigue","Patrick"];

// Je vais créer un tableau a 2 dimensions à partir de mes 2 tableaux précédents

var Annuaire = [listeDePrenoms,listeDeNoms];
console.log(Annuaire);

//Afficher un Nom et Prénom sur ma page HTML!

document.write(Annuaire[0][1]);
document.write(" ");
document.write(Annuaire[1][2]);

/*---------------------
EXERCICE

Créez un tableau à 2 dimensions appelé AnnuaireDesStagiaires qui contiendra toutes les coordonnées pour chaque stagiaire.

Ex. Nom, Prénom, Tel
----------------------*/
var AnnuaireDesStagiaires = [
   {"prenom" :"Teva", "nom" : "Natchitz", "tel" :"01"},
    {"prenom" :"Charles", "nom" : "Bergheaud", "tel" :"02"},
    {"prenom" :"Carole", "nom" : "Ambert", "tel" :"03"},
    {"prenom" :"Abdoulaye", "nom" : "Thiaw", "tel" :"04"}
    
];

console.log(AnnuaireDesStagiaires);

/*---------------------------
      AJOUTER UN ELEMENT
----------------------------*/
var Couleurs =['Bleu','Jaune','Vert','Orange'];
//-- Si je souhaite ajouter un élément dans mon tableau.
//-- Je fait appel à la fonction push() qui me renvoi le nombre d'éléments de mon tableau.

//--NB : La fonction unshift() permet d'ajouter un ou plusieurs éléments en début de tableau.

var nombreElementsDeMonTableau = Couleurs.push("Rouge");
console.log(Couleurs);
console.log(nombreElementsDeMonTableau);

/*--------------------------
    RECUPERER ET SORTIR LE DERNIER ELEMENT
    -------------------------------------*/

//-- La fonction pop() me permet de supprimer le dernier élément de mon tableau et d'en récupérer la valeur.

//-- Je peux accessoirement récupérer cette valeur dans une variable.
var monDernierElement = Couleurs.pop();

//-- La meme chose est possible avec le premier élément en utilisant la fonction shift();
//-- NB: la fonction splice() vous permet de faire sortir un ou plusieurs éléments de votre tableau.



