$(function(){
    // -- 1. Récupération de mes articles
    $.getJSON('https://jsonplaceholder.typicode.com/posts', function(articles){
        console.log(articles);
        //-- 2. Je vais parcourir la liste de mes articles pour les afficher sur la page.
        $.each(articles,function(indice, article){
            $("<section><header><h1>" + article.title + "</h1></header><article>" + article.body + "</article></section>").appendTo($('main'));
            
            if(indice == 5){
                return false;
         
            }
        });
    });
});