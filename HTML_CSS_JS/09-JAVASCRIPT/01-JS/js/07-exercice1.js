/*--
    Réaliser une fonction permettant à un internaute de :
        - Saisir son prénom dans un prompt
        - Retourner à l'utilisateur : Bonjour [Prenom], Quel age as-tu ?
        - Saisir son age
        - Retourner à l'utilisateur : Tu es donc né en [ANNEE DE NAISSANCE].
        - Afficher ensuite un récapiculatif dans la page.
        - Bonjour [PRENOM], tu as [age]
-- */


// 1 -- Initialisation des variables

var DateDuJour = new Date();

// 2 -- Création de la Fonction

function Hello(){
    

    // 2a. Je demande à l'utilisateur son prénom 
    prenom = prompt("Hello ! What is your name ?","Saisir votre prénom");

    // 2b. Je lui demande son age
    age = parseInt(prompt("Hello " + prenom + " ! How old are you ?","Saisir votre Age"));

    // 2c. J'affiche une alert avec son année de naissance !
    alert("AMAZING ! So you're born in " + (DateDuJour.getFullYear() - age) + "!");

    //2d. Affichage dans ma page HTML
    document.write("Hello " + prenom + " it's AMAZING ! you're " + age + " years old !");
}

// 3 -- Execution de la fonction
Hello();
    
    