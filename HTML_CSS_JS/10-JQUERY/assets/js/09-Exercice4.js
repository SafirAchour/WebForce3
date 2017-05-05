$ (function(){
    // -- 1ere facon de faire 
    $.ajax('http://geoip.nekudo.com/api/').done(function(resultat){
        console.log(resultat);
    });
    
    // -- 2ème facon avec getJSON, JSONP et Callback
    $.getJSON('http://ip-api.com/json/?callback=', function(resultat){
        console.log(resultat);
        
        // -- Affichage sur ma page
        $('<p> Votre IP est surveillée : ' + resultat.query + ' ' + resultat.isp +' </p>').css({'background':'yellow','color':'red'}).appendTo($('form'));
    });
});