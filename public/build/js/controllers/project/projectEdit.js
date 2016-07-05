angular.module('app.controllers')
    .controller('ProjectEditController', ['$scope','Project', 'Client', '$location', '$routeParams', 'appConfig', '$cookies',
        function($scope, Project, Client, $location, $routeParams, appConfig, $cookies){

            $scope.project = Project.get({id: $routeParams.id});
            $scope.clients = Client.query();
            $scope.status = appConfig.project.status;

            $scope.save = function(){
                if($scope.form.$valid){
                    $scope.project.owner_id = $cookies.getObject('user').id;
                    Project.update({id:$scope.project_id}, $scope.project, function(){
                        $location.path('/projects');
                    });
                }
            }

        }]);