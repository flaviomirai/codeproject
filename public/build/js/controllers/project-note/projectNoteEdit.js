angular.module('app.controllers')
    .controller('ProjectNoteEditController',
        ['$scope','ProjectNote', '$location' , '$routeParams',
            function($scope, ProjectNote, $location, $routeParams){
      $scope.projectNote = ProjectNote.get({
          id: $routeParams.id,
          noteId: $routeParams.noteId

      });



        $scope.save = function(){
            if($scope.form.$valid){
                ProjectNote.update({id:null, noteId: $scope.projectNote.id}, $scope.projectNote, function(){
                    $location.path('/project/' + $routeParams.id + '/notes');
                });
            }
        }

    }]);