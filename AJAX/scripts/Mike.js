$(function(){

/***************Exercice 1******************************/

  let index = 0; // L'index permettra de parcourir notre tableau d'image
  setInterval(function(){ // Permet d'effectuer une fonction toute les x seconde
    let image =["https://s-media-cache-ak0.pinimg.com/564x/74/16/64/7416646077933df96d842caecde53243.jpg","https://s-media-cache-ak0.pinimg.com/564x/d6/39/62/d63962760661e3fecba8917b2f803e0a.jpg","https://s-media-cache-ak0.pinimg.com/564x/8e/af/45/8eaf45f460f132276920a432f70f0153.jpg"]; // Variable qui stocke nos images
    if(index == image.length) // condition pour revenir à la première image
        index = 0;
    $("#slider-Mike").attr("src",image[index]); // Modifier la source de l'image
    index++;
  }, 3000);
})

/***************Exercice 2******************************/

$('#latest img').one("click",function(){ // Function se déclenche au click sur l'id
  $("#img1").attr("src","http://e.deportes.americadigital.pe/ima/0/0/3/4/7/347872/290x180.jpg");// Modifier la source de l'image
  $("#img2").attr("src","https://investobet.com/uploads/news/JV6qs6oF0EyhaMf7u23V__290x180.jpg");// Modifier la source de l'image
  $("#img3").attr("src","http://www.parquevida.com/files/2014/11/tevez-a-la-seleccion640-290x180.jpg");// Modifier la source de l'image
});

/***************Exercice 3******************************/
$('#latest img').click(function(){ // Function se déclenche au click sur l'id

let img = $("#img1").attr("src");// Je stock la valeur src de la première image dans la variable
$("#img1").attr("src",$("#img3").attr("src")); //Je modifie le src de la première img par le src de la 3eme img
$("#img3").attr("src",$("#img2").attr("src")); //Je modifie le src de la 3eme img par le src de la 2eme img
$("#img2").attr("src",img);//Je modifie le src de la 2eme img par le src de la 1eme img
});

/***************Exercice 4******************************/


$('.one_quarter .more a').click(function(){ // Function se déclenche au click sur la balise a qui se trouve dans la class more

  event.preventDefault(); //Annuler l'évènement par default

  $(this).parent().parent().children("p").eq(0).append(" Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");

  $(this).parent().parent().children("p").eq(1).hide();

});

/***************Exercice 5******************************/

var request = $.ajax({ // Envoi d'un request sur une url avec une methode
  url: "https://jsonplaceholder.typicode.com/users",
  method: "GET",
  dataType: "json" //optionnel . Defie le type de donnée recu par le serveur
});

request.done(function( users ) { // done = success . Code à effectuer en cas de réussite - réponse
  var content = "";
  console.log(users);
  for(var i = 0; i < users.length; i++){
    content += '<li><a href="#">'+users[i].name+'</a></li>'
  }
  $('#right_column ul').html(content) // Evénement du DOM - Modification de L'HTML dans la balise ul qui se trouve dans la balise qui a l'id right_column

});

request.fail(function( jqXHR, textStatus ) { // fail = éhec - Code à effectuer en cas de d'échec - REPONSE EN CAS d'ECHEC
  alert( "Request failed: " + textStatus );
});

/***************Exercice 6******************************/

$.ajax({
  url: "https://jsonplaceholder.typicode.com/photos",
  method: "GET",
  dataType: "json"
})


.done(function( photos ) {

  console.log($("#posts img"))

  for(var i = 0; i < 2; i++){
    $("#posts img").eq(i).attr("src", photos[i].url)
  }

  $(' #posts .more > a').click(function(){

    event.preventDefault();

    for(var i = 0; i < 2; i++){
      if(photos[i].url == $(this).parent().parent().parent().children("img").attr("src")){

        $(this).parent().parent().children("p").append(photos[i].title)
        };
        $(this).hide();

      }});

    })


.fail(function( jqXHR, textStatus ) {
  alert( "Request failed: " + textStatus )
});

/***************Exercice 7******************************/
