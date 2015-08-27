var projectDirective = function(MessageService,Project,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/portfolio/projectlist.html",
        restrict:"EA",
        scope:{
            openProjectWizard:"&openprojectwizard"
        },
        controller:function($scope,$rootScope) {

            var projects = Project.$search().$then(function (data) {
                $scope.projects = data;

                if ($scope.projects.length == 0) {
                    MessageService.setNoItemsInfoMessage($scope, " proyectos",
                        ". Pulsa el botón Nuevo para crear uno");
                }
            });

            $scope.newProject = function () {
                $rootScope.$broadcast('newProject');
                $scope.openProjectWizard();
            };

            $scope.editProject = function (project) {
                $rootScope.$emit('editProject',project);
                $scope.openProjectWizard();

            };

            //delete
            $scope.removeProject = function (project) {
                $scope.project = project;
                var confirmation = MessageService.setConfirmDeleteMessage(" proyecto", " ");
                if (confirmation) {
                    project.$destroy().$then(function (data) {
                        var meta = data.$response.data;
                        MessageService.setAlertMessage($scope, meta);
                    });
                }
            };

            //change status
            $scope.changeStatus = function ($event, project) {
                var checkbox = $event.target;
                var action = (checkbox.checked ? true : false);

                project.status = action;
                project.$save().$then(function (data) {
                    $scope.projects.$refresh();
                    var meta = data.$metadata.meta;
                    MessageService.setAlertMessage($scope, meta);
                });
            };

        }






    }

}
module.exports = projectDirective;
