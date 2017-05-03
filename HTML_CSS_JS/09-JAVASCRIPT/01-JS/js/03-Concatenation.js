/*-------------------------------
       LA CONCATENATION
--------------------------------*/

var DebutDePhrase       ="Aujourd'hui";
var DateDuJour          =new Date();
var SuiteDePhrase       =", sont présents : ";
var NombreDeStagiaires  = 11;
var FinDePhrase         =" stagiaires.<br>";

// -- Nous souhaitons maintenant,grace à la concatenation, afficher tout ce petit monde, en un seul morceau!

document.write(DebutDePhrase + DateDuJour.getDate() + "/" + (DateDuJour.getMonth()+1) + "/" + DateDuJour.getFullYear() + SuiteDePhrase +NombreDeStagiaires + FinDePhrase);

/*-------------------------
         EXERCICE
Créez une concatenation à partir des éléments suivants:
--------------------------*/

var phrase1 = "Je m'appelle";
var phrase2 = " Teva et j'ai ";
var age     = 20;
var phrase3 = " ans !";

document.write(phrase1 + phrase2 + age + phrase3)