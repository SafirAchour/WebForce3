/* ----------------------------------------------------------------------------
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~LE DOM~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Le Dom, est une interface de développement en JS pour HTML. Grâce au DOM, je vais être en mesure d'accéder / modifier mon HTML.

L'objet "document" : c'est le point d'entrée vers mon contenu HTML !

Chaque page chargé dans mon navigateyur à un objet "document".
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

// -- Allons faire un tour dans notre HTML --->

/* ----------------------------------------------------------------------------
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~document.getElementById~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


document.getElementById() : C'est une fonction qui va permettre de récupérer un élément HTML à partir de son identifiant unique : ID.

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

var bonjour = document.getElementById("bonjour");
console.log(bonjour); // <p> id="bonjour">Paragraphe</p>

/* ----------------------------------------------------------------------------
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~document.getElementByClassName~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


document.getElementByClassName() : C'est une fonction qui va permettre de récupérer un ou plusieurs éléments (une liste) HTML à partir de leur classe.

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

var contenu = document.getElementsByClassName("contenu");
console.log(contenu); 
// -- Me renvoi : un tableau JS avec mes éléments HTML, ou encore autrement dit, une collection d'éléments HTML.

/* ----------------------------------------------------------------------------
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~document.getElementByTagName~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

document.getElementByTagName() : C'est une fonction qui va permettre de récupérer un ou plusieurs éléments (une liste) HTML à partir de leur *nom de balise*.

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

var span = document.getElementsByTagName("span");
console.log(span);