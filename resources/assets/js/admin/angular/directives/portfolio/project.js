var projectDirective = function(MessageService,Project,$timeout,CategoryHelper,FileProcessor,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/portfolio/project.html",
        restrict:"EA",
        scope:{},
        controller:function($scope,$rootScope) {
            $scope.onFileSelect = function($files) {
                $scope.files = $files;

            };
            $rootScope.$on('newProject',function(){

                CategoryHelper.categoryList('/projectcatlist',$scope);
                var project = Project.$build();
                $scope.project = project;

                $scope.updateProject = function () {

                    //$rootScope.$broadcast('editProject',project);
                    project.$save().$then(function (data) {
                        //$scope.projects.$refresh();
                        $scope.projectForm.$resetForm();
                        var meta = data.$metadata.meta;
                        MessageService.setAlertMessage($scope, meta);

                        if(typeof $scope.files !== "undefined") {
                            if($scope.files.length > 0){
                                FileProcessor.upload($scope,'/uploadProjectFeatureImage',data.id);
                                $scope.files = [];
                            }
                        }
                        $rootScope.$broadcast('projectCreated',project);

                    });
                }

            });

            $rootScope.$on('editProject',function(event,data){
                $scope.files = [];
                var project = data;
                FileProcessor.download($scope,'/projectimage/'+project.id);
                CategoryHelper.categoryList('/projectcatlist',$scope);
                CategoryHelper.projectCategoryList('/projectcatlistselected/'+project.id,$scope);


                $scope.project = project;
                $scope.updateProject = function(){
                    project.$save().$then(function(data){
                        var meta = data.$metadata.meta;
                        MessageService.setAlertMessage($scope,meta);
                        //upload file
                        if($scope.files.length > 0){
                            FileProcessor.upload($scope,'/uploadProjectFeatureImage',data.id);
                            $scope.files = [];
                        }

                    });
                }

            });

            $rootScope.$on('editProject',function(evt,data){
                $scope.project = data;
            });





        }
    }

}
module.exports = projectDirective;
