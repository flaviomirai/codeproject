angular.module('app.controllers')
    .controller('ProjectNoteRemoveController',
        ['$scope','ProjectNote', '$location' , '$routeParams',
            function($scope, ProjectNote, $location, $routeParams){
      $scope.projectNote = ProjectNote.get({
          id: $routeParams.id,
          noteId: $routeParams.noteId
      });
        $scope.remove = function(){
            $scope.projectNote.$delete({id:null, noteId: $scope.projectNote.id}).then(function(){
                $location.path('/project/' + $routeParams.id + '/notes');
            });
        }

    }]);