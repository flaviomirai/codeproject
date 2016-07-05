angular.module('app.controllers')
    .controller('ClientRemoveController',
        ['$scope','Client', '$location' , '$routeParams',
            function($scope, Client, $location, $routeParams){
      $scope.client = Client.get({id: $routeParams.id});



        $scope.remove = function(){
            $scope.client.$delete().then(function(){
                $location.path('/clients');
            });
        }

    }]);