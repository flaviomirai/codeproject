angular.module('app.controllers')
    .controller('ClientEditController',
        ['$scope','Client', '$location' , '$routeParams',
            function($scope, Client, $location, $routeParams){
      $scope.client = Client.get({id: $routeParams.id});



        $scope.save = function(){
            if($scope.form.$valid){
                Client.update({id: $scope.client.id}, $scope.client, function(){
                  $location.path('/clients');
                });
            }
        }

    }]);