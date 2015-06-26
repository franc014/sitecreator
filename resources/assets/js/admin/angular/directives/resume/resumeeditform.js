var resumeEditDirective = function(MessageService,Resume,$timeout){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/resumeeditform.html",
        restrict:"EA",
        scope:{
            resume:"=res",
            close:"&close"
        },
        controller:function($scope,$rootScope){
            $scope.closeForm = function(){
                $scope.close();
            }

            $scope.saveResume = function(){

                 this.resume.$save().$then(function(data){
                     var meta = data.$metadata.meta;
                     MessageService.setAlertMessage($scope,meta);
                     $rootScope.$emit("updateResumeList");
                     $rootScope.$emit("resumeChange",data.$response.data);
                     $timeout(function(){
                         $scope.close(data);
                     },4000);

                     //$scope.$parent.showedEditResumeForm = false;
                 });
            }

        }
    }
}

module.exports = resumeEditDirective;