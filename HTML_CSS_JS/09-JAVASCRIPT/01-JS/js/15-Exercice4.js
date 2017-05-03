/*
CONSIGNE : 

Considérons un Formulaire HTML avec les champs pseudo, age, email et mdp.
Considérons un Tableau JS contenant une liste de membre.

---------

ETAPE 1 : Lors de la saisie d'un Pseudo, vérifiez en temps réel grâce aux évènements que celui-ci n'existe pas dans le tableau de membre.

Si le Pseudo existe dans le tableau Membre, la notification pseudoError doit s'afficher et le bouton "submit" être désactivé.

A l'inverse, si le Pseudo n'existe pas dans le tableau Membre, ou que l'utilisateur à corriger son Pseudo, alors, le bouton est actif et la notification pseudoError ne s'affiche pas / plus.

---------
---------

ETAPE 3 : 
   
Lors de la saisie du Pseudo, vous devrez afficher en temps réel dans le titre id "Bienvenue" : Bonjour [Pseudo] : Pseudo étant la saisie en cours de l'utilisateur.
  
---------


*/

 var membres = [
          {'pseudo':'Hugo',     'age':26,   'email':'wf3@hl-media.fr',      'mdp':'wf3'},
          {'pseudo':'Rodrigue', 'age':56,   'email':'rodrigue@hl-media.fr', 'mdp':'roro'},
          {'pseudo':'James',    'age':78,   'email':'james@hl-media.fr',    'mdp':'james8862'},
          {'pseudo':'Emilio',   'age':18,   'email':'milio@hl-media.fr',    'mdp':'milioDu62'}
        ];  

// -- LesFlemards.js
function l(e) {
    console.log(e);
}

function w(f) {
    document.write(f);
}

// ---------------- Récupérer le champ input Pseudo
var pseudo = document.getElementById("pseudo");
l(pseudo.value);

// ---------------- Récupérer la div Pseudo Error
var submit = document.getElementById('submit');
var Bienvenue = document.getElementById('Bienvenue');
var pseudoError = document.getElementsByClassName('pseudoError')[0];


pseudo.addEventListener ("keyup", function() {
    
for(i=0 ; i < membres.length ; i++) {
    
if(pseudo.value == membres[i].pseudo){
        
    pseudoError.style.display ="block";
    submit.disabled = true;
    Bienvenue.textContent ="";
    
    break;
    
}else{
    pseudoError.style.display ="none";
    submit.disabled = false;
    Bienvenue.textContent = "Bienvenue " + pseudo.value + "!";
}
    
};
    
});

/*
    ---------

ETAPE 2 : L'inscription n'est possible qu'aux personnes majeurs de 18 ans.
Vous devez donc vérifier que l'age saisi est bien supérieur ou égale à 18 ans.

Si cette condition n'est pas valide, alors la notification ageError doit s'afficher et le bouton "submit" être désactivé.

Quand l'utilisateur corrige son age, la situation revient à la normal. La notification ageError ne s'affiche plus et le bouton submit est de nouveau disponible.

---------
*/

var age =document.getElementById('age');
l(age);
var ageError = document.getElementsByClassName('ageError')[0];

var Majorite = 18;

age.addEventListener("change",function () {
    if (age.value < Majorite){
    ageError.style.display ="block";
    submit.disabled = true;  
}else{
    ageError.style.display ="none";
    submit.disabled = false;  
    
}
});

/* -------------------------------------
ETAPE 4 : Si toutes les conditions sont validées, l'utilisateur va pouvoir procéder à son inscription.
  
  En cliquant sur le bouton "M'inscrire", vous devrez enclencher une action permettant :
  
      A. L'ajout de l'utilisateur dans le tableau.
      B. L'affichage pour l'utilisateur sur la page d'un message de bienvenue, ainsi que la liste des membres inscrit dans une liste non-ordonnée.
      
      Ex. Merci Hugo ! Tu es maintenant inscrit.
      Voici la liste de nos Membres :
      
          Hugo : 26ans
          Rodrigue : 56ans
          ...
          
      NB : Devra bien entendu s'afficher le membre qui vient de s'inscrire.

--------------------------------------------*/


/*--------4A-----------*/
var email =document.getElementById('email');
var mdp = document.getElementById('mdp');
var form =document.getElementById('InscriptionForm');

form.addEventListener("submit",function(e){
    // -- Arreter l'action par défaut du submit
    // -- Bloquer la redirection de la page
    e.preventDefault();
    
    // -- Créer un objet qui contiendra les informations de mon memebre qui souhaite s'inscrire.
    var membre = {};
    membre.pseudo = pseudo.value;
    membre.age = age.value;
    membre.email = email.value;
    membre.mdp = mdp.value;
    
    // -- Ajouter le membre aux membres.
    membres.push(membre);
    
    // -- Je met à jour le nombres de membres du tableau.
    NombreDeMembres = membres.length;
    executeList();
    
});

l(membres);

/*-----------4B--------------*/

function executeList() {
    
    var p = document.createElement("p");
    p.innerHTML ="Merci" + pseudo.value + "! <br><strong> Tu es maintenant inscrit. </strong> <br><br><u> Voici la liste de nos membres </u>";
    
    document.body.appendChild(p);
    
    //-- Générer ma liste de membre
    var ul = document.createElement("ul");
    for(i=0 ; i < NombreDeMembres ; i++){
        
        // -- A chaque itération de ma boucle , je créer un élément li avec le pseudo et l'age de mon membre puis je l'intègre dans le ul .
        var li = document.createElement("li");
        var liste = membres[i].pseudo + " : " + membres[i].age + "ans";
        li.textContent = liste;
        ul.appendChild(li);
        
    }
    
    // -- A la fin de ma boucle, tous les li ont été crée. Je peux maintenant envoyer mon ul pour affichage
    document.body.appendChild(ul);
}
