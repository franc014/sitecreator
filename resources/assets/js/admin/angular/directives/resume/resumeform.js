var resumeCreationDirective = function(MessageService,Resume,$timeout){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/resumeform.html",
        restrict:"EA",
        scope:{
            close:"&close"
        },
        controller:function($scope,$rootScope){
            $scope.closeForm = function(){
                $scope.close();
            }

            $rootScope.$on("newResume",function(){
                var resume = Resume.$build();
                $scope.resume = resume;

                $scope.createResume = function(){
                    resume.$save().$then(function(data){
                        var meta = data.$metadata.meta;
                        MessageService.setAlertMessage($scope,meta);
                        $rootScope.$emit("updateResumeList");
                        $rootScope.$emit("resumeChange",data.$response.data);
                        $timeout(function(){
                            $scope.close(data);
                            //$scope.$destroy();
                        },4000);
                    });

                }

            });


        }
    }
}

module.exports = resumeCreationDirective;