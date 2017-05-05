function validateEmail(email){
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

// -- initialisation de jQuery

$(function(){
    
    $('#contact').on('submit',function(event){
        // -- Event : correspond à notre evenement submit
        // -- arreter la propagation du submit (Redirection)
        event.preventDefault();
        
        // -- Réinitialisation des Erreurs
            // -- Je supprime la classe ".has-error" en ciblant les éléments qui contiennent la classe ".has-error".
        $('#contact .has-error').removeClass('has-error');
        $('#contact .text-danger').remove();
        
        // -- Déclaration des Variables (Champs à vérifier).
        var nom = $('#nom');
        var prenom = $('#prenom');
        var email = $ ('#email');
        var tel = $ ('#tel');
        
        
        
            // -- Vérification du Nom 
        if(nom.val().length == 0){
            // -- Si le champs nom est vide, alors j'ajoute à son parent, la classe has-error
            nom.parent().addClass('has-error');
            // -- Et je rajoute une indication texte
            $("<p class='text-danger'> N'\noubliez pas de saisir votre nom </p>")
            .appendTo(nom.parent());
            
        };
            // -- Vérification du Prénom
        if(prenom.val().length == 0){
            prenom.parent().addClass('has-error');
            $("<p class='text-danger'> N'\noubliez pas de saisir votre prenom </p>")
            .appendTo(prenom.parent());
            
            
        };
            // -- Vérification du Téléphone
        if(tel.val().length == 0|| $.isNumeric(tel.val()) == false){
            tel.parent().addClass('has-error');
            $("<p class='text-danger'> N'\noubliez pas de saisir votre numéro de téléphone </p>")
            .appendTo(tel.parent());
            
        };
            // -- Vérification de l'email
        if(!validateEmail(email.val())){
            email.parent().addClass('has-error');
            $("<p class='text-danger'> Saisissez votre email correctement </p>")
            .appendTo(email.parent());
            
        };
        
        // -- Je recherche dans mon formulaire #contact s'il y a des éléments qui ont pour classe : 'has-error'. S'il n'y a pas d'élément, c'est à dire length == 0 alors je procède à la validation, sinon j'affiche une notification.
        if($(this).find('.has-error').length == 0){
            $(this).replaceWith('<div class="alert alert-sucess"> Votre demande a bien été envoyée ! Nous vous répondrons dans les meilleurs délais.</div>');
        }else{
            $(this).prepend("<div class='alert alert-danger'>Nous n'avons pas été en mesure de valider votre demande. Vérifiez vos informations. </div>");
        }
    });
    
});