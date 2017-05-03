/* -------------------------------------------
            LES BOUCLES 
----------------------------------------------*/

// -- La Boucle FOR
// -- Pour i=1 ; tant que i <= (strictement inférieur ou égale) 10 ; alors, j'incrémente i de +1;
for(var i = 1 ; i <= 10 ; i++) {
    document.write("<p> Instruction executée :<strong>" + i + "</strong></p>")
}

// -- SUBTILITE 

var i = 40;
i++ // Affiche 40
++i // Affiche 41

// -- La Boucle WHILE : Tant que

var j = 1;
while(j<=10) {
    document.write("<p>Instruction executée :<strong>" + j + "</strong></p>")
}


/*---------------------------------
           EXERCICE                  
----------------------------------*/

// -- Supposons, le tableau suivant:
var Prenoms = ['Hugo', 'Jean', 'Matthieu', 'Luc', 'Pierre','Marc'];

// -- CONSIGNE : Grâce à une boucle FOR, afficher la liste des prénoms du tableau suivants dans la console ou sur votre page.

// -- 1ere Facon de faire

for(var i = 0 ;  i < 6 ; i++) {
    console.log(Prenoms[i]);
}

// -- 2ème Facon de faire avec "length"
var NbElementsDansMonTableau = Prenoms.length;
for(var i = 0; i < NbElementsDansMonTableau; i++){
    console.log(Prenoms[i]);
}

// -- Meme exercice avec la boucle while
var  j = 0;
while(j < Prenoms.length){
    console.log(Prenoms[j]);
    j++;
}

// -- Autre Facon de parcourir mon tableau.
// -- ATTENTION  ici la performance ...

Prenoms.forEach(affichePrenoms);
function affichePrenoms(Prenom, index){
    console.log(Prenom)
}
