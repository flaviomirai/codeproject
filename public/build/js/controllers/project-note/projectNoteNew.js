angular.module('app.controllers')
    .controller('ProjectNoteNewController', ['$scope','ProjectNote', '$location', '$routeParams' ,function(
        $scope, ProjectNote, $location, $routeParams){
      $scope.projectNote = new ProjectNote();
        $scope.projectNote.project_id = $routeParams.id;
        $scope.save = function(){
            if($scope.form.$valid){
                $scope.projectNote.$save({id: '$routeParams.id'}).then(function(){
                    $location.path('/project/' + $routeParams.id + '/notes');
                });
            }
        }

    }]);