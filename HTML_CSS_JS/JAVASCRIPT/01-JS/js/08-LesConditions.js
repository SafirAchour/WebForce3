/*---------------------------
          LES CONDITIONS
------------------------------*/

/*
var MajoriteLegaleFR = 18;

if(MajoriteLegaleFR >= 19) {
    alert("Bienvenu !");
} else{
    alert("Google...");
}
*/

/*-------------------------------------------------------------
                    EXERCIE
Créer une fonction permettant de vérifier l'age d'un visiteur.
S'il à la majorité, Alors je lui souhaite la bienvenue, sinon, je fait une redirection sur Google après lui avoir signalé le soucis.
---------------------------------------------------------------*/

/*
// 1 -- Initialisation des variables
 var DateduJour = new Date();
 var MajoriteLegaleFR = 18;

// 2b. Je lui demande son age
function verifierAGE(){
    return parseInt(prompt("HOW OLD ARE YOU ? ", "Saisir votre Age"));
}



if( verifierAGE() >= MajoriteLegaleFR) {
    alert("Bienvenu sur mon site internet pour les majeurs...");
} else{
    alert("ATTENTION!!! Vous devez etre majeur pour accéder à ce site !");
    document.location.href = "https://www.google.fr/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8"
}
*/


/*-----------------------------------------------
     LES OPERATEURS DE COMPARAISON 
------------------------------------------------*/

// -- L'Opérateur de comparaison "==" signifie : Egal à ... Il permet de vérifier que deux variables sont identiques.

// -- L'opérateur de Comparaison "===" signifie : Strictement égal à ... Il va comparer la valeur et aussi le type de donnée.

// -- L'opérateur de Comparaison "!=" signifie : Différent de

// -- L'opérateur de Comparaison "!==" signifie : Strictement différent de 


/*-------------------------------------------------------------
     EXERCICE :
     J'arrive sur un Espace Sécurisé au moyen d'un email et d'un mot de passe.
     Je doit saisir mon email et mon mot de passe afin d'être authentifié sur le site.
     En ca d'échec une alert m'informe du problème.
     Si tous se passe bien, un message de bienvenue m'accueil.
---------------------------------------------------------------'*/

// -- BASE DE DONNEES
 
var email, mdp;

email ="wf3@hl-media.fr";
mdp ="wf3";


function connexion (){
    return (prompt("EMAIL", "SAISIR VOTRE EMAIL"));
}


if (connexion() == email) {
    prompt(" MOT DE PASSE ", "SAISIR VOTRE MOT DE PASSE");
    /*var mdplogin = prompt (" MOT DE PASSE ", "SAISIR VOTRE MOT DE PASSE");*/
    
    if (mdplogin() == mdp){
        alert("Bienvenu Utilisateur!");
    } else {
        alert("ATTENTION, nous n'avons pas reconnu votre mot de passe.");
    }
    
    
} else {
    alert("ATTENTION!!! Votre identifiant est incorrecte");
}


/*-------------------------------------------------------------
               LES OPERATEURS DE LOGIQUES 
-------------------------------------------------------------*/

// L'opérateur ET : && ou AND

// -- Si la combinaison EmailLogin et email correspond ET la combinaison mdpLogin et mdp correspond.

// -- Dans cette condition, les 2 doivent obligatoirement correspondre pour etre validée.

if( (emaillogin === email) && (mdplogin === mdp)) {...}


// L'opérateur OU : || ou OR

// -- Si la combinaison EmailLogin et email correspond OU la combinaison mdpLogin et mdp correspond.

// -- Dans cette condition, au moins l'une des deux doit correspondre pour etre validée.

if( (emaillogin == email) || (mdplogin == mdp)) {...}

// -- L'opérateur "!" : signifie le CONTRAIRE de, ou encore NOT

var isUserApproved = true;
if(!siMonUtilisateurEstApprouve) {// Si l'utilisateur n'est pas approuvé.
}

// -- Reviens également à écrire :
if(siMonUtilisateurEstApprouve == false) { }



