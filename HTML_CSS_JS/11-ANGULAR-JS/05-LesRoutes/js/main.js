// -- Initialisation de notre apllication angular
angular.module('mainApp',['ngRoute'])

/*-------------------------------------
            Gestion des Routes          
---------------------------------------*/
.config(function($routeProvider){
    $routeProvider
    .when('/',{
        templateUrl: 'templates/main.htm'
    })
    .when('/connexion',{
        templateUrl: 'templates/connexion.htm'
    })
    .when('/inscription',{
        templateUrl: 'templates/inscription.htm'
    })
})




/*-------------------------------------
            Les Controlleurs         
---------------------------------------*/
// -- déclaration de notre controlleur principal
.controller('mainController',['$scope',function($scope){
    
}]);