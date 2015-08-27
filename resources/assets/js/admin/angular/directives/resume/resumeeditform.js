var resumeEditDirective = function(MessageService,Resume,ResumeHelper,$timeout){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/resumeeditform.html",
        restrict:"EA",
        scope:{

            close:"&close"
        },
        controller:function($scope,$rootScope){

            $rootScope.$on("editResume",function(event,resume){
                                //biographies dropdown list
                ResumeHelper.bioDropDownList('/bio_drop_list',$scope);
                $scope.resume = resume;
                var bioId = resume.biographyId;
                $scope.resume.biography_id = bioId.toString();
                //console.log($scope);
                $scope.closeForm = function(){
                    $scope.close();
                }
                //$scope.resume.biographyId = 1;//$scope.bios[$scope.resume.biography_id];
                $scope.saveResume = function(){

                    $scope.resume.$save().$then(function(data){
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
            });


        }
    }
}

module.exports = resumeEditDirective;