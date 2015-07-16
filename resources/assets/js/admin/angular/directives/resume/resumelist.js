var resumeList = function(MessageService,Resume,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/resumelist.html",
        restrict:"EA",
        scope:{},
        controller:function($scope,$rootScope) {
            $scope.closeForm = function(){
                Helper.enableForm($scope,false);
            }
            Helper.enableForm($scope,false);

                var resumes = Resume.$search().$then(function (data) {
                        $scope.resumes = data;
                        if ($scope.resumes.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " résumés",
                                ". Pulsa el botón Nuevo para crear uno");
                        }
                    });

                    $scope.newResume = function () {



                    };

                    $scope.editResume = function (education) {

                    };

                    //delete
                    $scope.removeResume = function (education) {

                    };

                    //change status
                    $scope.setDefault = function ($event, resume) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        resume.default = action;
                        resume.$save().$then(function (data) {
                            $scope.resumes.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };

                    $scope.showDetail = function(resume){

                        var data = {
                            resume:{
                                id:resume.id
                            }
                        };
                        $rootScope.$emit("resumeChange",data);
                    }

        }
    }

}
module.exports = resumeList;
