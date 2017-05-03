/*---------------------------------------------------
Les Evenements

Les événements vont me permettre de déclencher 
une fonction, c'est à dire une série d'instructions
suite à une action de mon utilisateur.

OBJECTIF: être en mesure de capturer ces événements, 
afin d'exécuter une fonction.
----------------------------------------------------*/

// -- Les événements : MOUSE (Souris)

    //  click : au clic sur un élément.
    //  mouseenter : la souris passe par dessus la zone occupée par un élément.
    //  mouseleave : la souris sort de cette zone.

// -- Les événements : KEYBOARD (Clavier)

    // keydown : une touche du clavier est enfoncée.
    // keyup : une touche a été relachée.

// -- Les événements : Window (Fenetre)

    // scroll : défilement de la fenêtre.
    // resize : redimensionnement de la fenetre.

//--les evenements : form (formulaire)

    //change: pour les element <input>, <select> et <textarea>
    // submit : a l'envoie d'un formulaire

// -- Les événements : DOCUMENT

    // DOMContentLoaded : Executé lorsque le document HTML est complétement chargé sans attendre le CSS et les images.

/*----------------------------------
    LES ECOUTEURS D'EVENEMENTS'
------------------------------------*/

// -- Pour attacher un évènement à un élément, ou autrement dit, pour déclarer un écouteur d'évènement qui se chargera de lancer une action, c'est à dire une fonction pour un évènement donné, je vais utiliser la syntaxe suivante :

var p = document.getElementById("MonParagraphe");
console.log(p);

// -- Je souhaite que mon paragraphe soit rouge au clic de la souris.

    //-- 1 : Je défini une fonction chargée d'executer cette action.
    function changeColorToRed() {
        p.style.color = "red";
    }

    // -- 2 : Je déclare un écouteur qui se chargera d'appeler la fonction au déclenchement de l'évènement.
p.addEventListener("click", changeColorToRed);


/*--------------------------------------------------
      EXERCICE PRATIQUE 
A l'aide de javascript, créez un champ "input" type text avec un ID unique.
Afficher ensuite dans une alerte, la saisie de l'utilisateur.
----------------------------------------------------*/
// -- Création du champ input
var input = document.createElement("input");
// -- Attribution d'un Attribut
input.setAttribute('type','text');
// -- Attribution d'un ID
input.id = "MonInput";
// --Ajout de l'élément dans la page.
document.body.appendChild(input);


//-----------------------------

// -- Création d'un écouteur
input.addEventListener('change',afficheLaSaisieDeMonInput);

function afficheLaSaisieDeMonInput(){
    alert(input.value);
}













