// alert("wow tu est sur ma page");

// deux slash pour faire un commentaire uniligne en javascript.

/* commentaire de plusieurs lignes en js */

// -- 1 : déclarer une variable en JS 

var prenom;

// -- 2 : affecter une valeur

prenom = "hugo";

// -- 3 : afficher la valeur de ma variable dans la console .

console.log(prenom);

/*-------------------------------------------------------------
|-----------------LES TYPES DE VARIABLES-----------------------|
---------------------------------------------------------------*/

// -- Ici typeof me permet de connaitre le type de ma variable.
console.log(typeof prenom); /* string */

var age;

age = 40;

console.log(age);

console.log(typeof age); /* number */


/*-------------------------------------------------------------
|-----------------LA PORTEE DES VARIABLES-----------------------|
---------------------------------------------------------------

les variables déclarées directement a la racine du fichier js sont appelées variables GLOBALES.

Elles sont disponible dans l'ensemble de votre document, y compris dans les fonctions .

La portée des variables globales s'arrete au fichier .
si je change de page , les variables n'existe plus .

###

Les variables déclarées a l'interieur dune fonction sont appelées varibles locales . 

elle sont disponibles uniquement a linterieur de ma fonction

###

Depuis ECMA6 vous pouvez declarer une variable avec le mot-clé "let".
votre variable sera alors accessible uniquement danas le bloc dans lequel elle est contenu.

Si elle est declarée dans une fonction elle sera disponible que dans le bloc de la fonction.

Si elle est déclarée dans une condition elle sera disponible que dans le bloc de la condition .

------------------------------------------------------------------------------------*/

//-- Les variable FLOAT
var unedecimale = -2.984;
console.log(unedecimale);
console.log(typeof unedecimale);

//-- les Booléens (vrai/faux)
var unbooleen = false; // -- true 
console.log(unbooleen);
console.log(typeof unbooleen);

// -- Les Constantes 

/* la declaration CONST permet de créer une constance accessible uniquement en lecture . sa valeur ne pourra pas etre modifiée par des reaffectations  ulterieurs .
Une constante ne peut etre declarée a nouveau .*/

// -- generalement par convention les constance sont en majuscules .
const PAYS = "France";

//-- je ne peux pas faire cela ...
//PAYS = "guadeloupe";
// uncaught typeError: assignement to constant variable.

/* ---------------------------------------------------------------------------------
                            La minute info

Au fur et a mesure que l'on affecte ou ré-affecte des valeurs a une varibles , celle ci prend la nouvelle valeur et le nouveau type .

EN javascript (ecma script) les variables sont auto-typées .

pour convertir une variable de type number en string et string en number je peux utiliser les fonctions native de javascript. */

var unnombre ="24";
console.log(unnombre);
console.log(typeof unnombre);

// -- la fonction parseint() pour retourner un entier a partir de ma chaine de caractere 

unnombre = parseInt(unnombre);
console.log(unnombre);
console.log(typeof unnombre);

//-- je ré-affecte une valeur a ma variable 
unnombre = "12.55";
console.log(unnombre);
console.log(typeof unnombre);

//-- la fonction ParseFloat () permet de retrouver un float sur la base dune chaine de caractere 

unnombre = parseFloat(unnombre);
console.log(unnombre);
console.log(typeof unnombre);

//-- conversion d'un nombre en string
var unnombreenstring = 10;
var machainedecaractere= unnombreenstring.tostring();
console.log(unnombreenstring);
console.log(typeof unnombreenstring);
console.log(typeof machainedecaractere);