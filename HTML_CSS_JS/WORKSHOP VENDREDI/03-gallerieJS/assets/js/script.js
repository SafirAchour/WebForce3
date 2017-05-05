/*
Intitulé de l'exercice :
01 - initialiser la galerie d'image en s'inspirant de la structure
02 - créer une fonction qui va récupérer la source d'une image lorsqu'on clique dessus et intégrer cette source sur une autre balise image.
    001 - au clique --> récupérer la source de l'image
    002 - stocker sa valeur dans une variable
    003 - au clique --> intégrer l'élément stocké comme source de la nouvelle image'
    004 - Le processus doit fonctionner en alternatif --> récupérer source / intégrer source 
*/

var tabImages = [
  'https://s-media-cache-ak0.pinimg.com/564x/a2/fc/97/a2fc976aec0f00ca1fbd7149366dae8d.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/36/56/70/3656706b401466401f7539a8da910220.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/49/3b/4b/493b4bba089437d76cd964227cba75ac.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/62/12/f5/6212f59c09e483e578906349c7d88048.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/ab/c7/f6/abc7f615f2d7867b5de37cc4a014f877.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/22/4b/e2/224be2cb926ea1ebac5279524a45100e.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/3b/c1/79/3bc17960fb1da9bc870da42cb041c177.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/67/13/82/671382f405d1ab75f6d69afa8f137c80.jpg',
  'https://s-media-cache-ak0.pinimg.com/564x/b2/25/7f/b2257f664eb6fdac504634aed36e8f96.jpg'
]

function generationGalerie(tableau){
    for(var i=0; i<tableau.length; i++){
        
        var square = '<div class="col-xs-4"><img class="img-thumbnail" src="' + tableau[i] + '" alt=""></div>';
        
       // console.log(square);
        
        $(square).appendTo(".container");
        
    }
};


var getSource = '';

$(function(){
    generationGalerie(tabImages);
    
    $('img').on('click',function(event){
        //console.log(event.target.src);
        
        if( getSource.length == 0){
            
            getSource = event.target.src;
            
        }else{
            var memory = event.target.src;
            event.target.src = getSource;
            getSource = memory;
            
        }
        
    })
});



