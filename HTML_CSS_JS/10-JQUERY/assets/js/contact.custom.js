// -- Initialisation de jQuery (DOM READY)

$(function(){
    // -- Déclaration de Variables
    var Contacts = [];

    
    
    /*--------------------------------------------------------------------------------
                    DECLARATION DES FONCTIONS                       
    ------------------------------------------------------------------------------------*/
    
    // -- Fonction ajouterContact(Contact): Ajouter un contact dans le tableau de Contacts, mettre à jour le tableau HTML, réinitialiser le formulaire et afficher une notification.
    
    function ajouterContact(Contact){
        // -- Ajout du "Contact" dans le tableau "Contacts"
        Contacts.push(Contact); //console.log(Contacts)
        //-- On cache la phrase : aucun contact
        $(".aucuncontact").hide();
        // -- Mise à jour HTML
        $('#LesContacts').find('tbody').append('<tr><td>'+ Contact.nom+'</td><td>'+Contact.prenom +'</td><td>'+Contact.email+'</td><td>'+Contact.tel+'</td></tr>');
    };
    
    // -- Fonction RéinitialisationDuFormulaire(): Après l'ajout d'un contact, on remet le formulaire à 0!
    function reinitialisationDuFormulaire(){
        document.getElementById('contact').reset();
        // -- EN jQuery 
        $("#contact").get(0).reset();
    };
    
    // -- Affichage d'une Notification
    function  afficheUneNotification(){
        $(".alert-contact").fadeIn().delay(3000).fadeOut();
    };
    
    // -- Vérification de la présence d'un contact dans Contacts
    
    function estCeQunContactEstPresent (Contact){
        // -- Booleen qui indique la présence ou pas d'un contact
        var estPresent = false;
        // -- On parcours le tableau à la recherche d'une correspondance
        for(i = 0 ; i < Contacts.length ; i++){
            // -- Vérification pour chaque contact du tableau, s'il y a une correspondance avec mon Contact.
            if(Contact.email == Contacts[i].email) {
                //-- Si une correspondance est trouvé "estPresent" passse a VRAI (true)
                estPresent=true;
                
                //-- On arrete la boucle, plus besoin de poursuivre
                break;
            }
        }
        
        // -- On retourne estPresent
        return estPresent;
    };
    
    // -- Vérification de la validité d'un email
    function ValidateEmail(email){
       var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
       if(!regex.test(email))
       {
          return false;
       }
       else
       {
          return true;
       }
    };
    
    /*-----------------------------------------------------------
                  TRAITEMENT DE MON FORMULAIRE
    -------------------------------------------------------------*/
    
    // -- Detection de la soumission de mon formulaire
    $('#contact').on("submit",function(e){
        
    
        // -- Arret de la propagation du submit
        e.preventDefault();
        
        // -- Récupération ds champs à vérifier
        var nom, prenom, email, tel;
        nom = $('#nom');
        prenom = $('#prenom');
        email = $ ('#email');
        tel = $ ('#tel');
        
        // -- Vérification des informations...
        var MesInformationsSontValides = true;
        
            // -- Vérification du Nom 
        if(nom.val().length == 0){
            MesInformationsSontValides = false;
        };
            // -- Vérification du Prénom
        if(prenom.val().length == 0){
            MesInformationsSontValides = false;
        };
            // -- Vérification du Téléphone
        if(tel.val().length == 0){
            MesInformationsSontValides = false;
        };
            // -- Vérification de l'email
        if(!ValidateEmail(email.val())){
            MesInformationsSontValides = false;
        };
        // -- tous est correct, préparation du contact
        if(MesInformationsSontValides) {
            var Contact = {
                "nom" : nom.val(),
                "prenom" : prenom.val(),
                "email" : email.val(),
                "tel" : tel.val()
        };
           //-- Vérification EstCeQunContactEstPresent ?
            if(!estCeQunContactEstPresent(Contact)){
                //--Ajout du Contact
                ajouterContact(Contact);
            }else{
                alert('ATTENTION\nMalheuresement, ce contact est déjà présent.');
                reinitialisationDuFormulaire();
            }
            
        }else{
            // -- ou, les informations ne sont pas valides .
            alert("ATTENTION\nVeuillez bien remplir tous les champs.")
        }
        
    })
        
});
  