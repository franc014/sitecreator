var projectWizardDirective = function(MessageService,Project,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/portfolio/projectwizard.html",
        restrict:"EA",
        scope:{
            openProjectList:'&openprojectlist'
        },
        controller:function($scope,$rootScope) {


            $rootScope.$on('projectCreated',function(evt,data){

                $scope.project = data;

            });
            $rootScope.$on('editProject',function(evt,data){
                $scope.project = data;

            });

            $scope.closeWizard = function(){
               $scope.openProjectList();
               location.href = '/admin/projects';
            }

        }
    }

}
module.exports = projectWizardDirective;
