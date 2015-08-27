var resumeDirective = function(MessageService,Resume,$timeout,ResumeHelper){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/resume.html",
        restrict:"EA",

        scope:{

        },
        controller:function($scope,$rootScope){

            $rootScope.$on('noResumeFound',function(){
                MessageService.setNoItemsInfoMessage($scope, " résumés",
                    ". Pulsa el botón Nuevo para crear");
            })
            $rootScope.$on('resumeChange',function(event,args){

                if(typeof args.resume !== "undefined")
                {
                    //biographies dropdown list
                    //ResumeHelper.bioDropDownList('/bio_drop_list',$scope);
                    //console.log(args);
                    var resumes = Resume.$search().$then(function (data) {
                        $scope.resumes = data;

                        if ($scope.resumes.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " résumés",
                                ". Pulsa el botón Nuevo para crear uno");
                        }
                    });


                    var resume = Resume.$find(args.resume.id);
                    $scope.resume = resume;
                    $scope.updateResume = function () {
                        $scope.resume.$save().$then(function (data) {
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                            $scope.showResumeForm = false;
                        });
                    }
                }
            });

            $scope.newResume = function(){
                $scope.showedResumeForm = true;
                $rootScope.$emit("newResume");
            };

            $scope.deleteResume = function(resume){
                var confirmation = MessageService.setConfirmDeleteMessage(" résumé",". Todos las secciones del résumé serán eliminadas también...");
                if(confirmation) {
                    resume.$destroy().$then(function (data) {

                        var meta = data.$response.data;
                        MessageService.setAlertMessage($scope, meta);
                        $timeout(function () {
                            location.href = "/admin/resume"
                        }, 2000);

                    });
                }
            }

            $scope.publication = function(resume, toBePublished){
                if(toBePublished) {
                    resume.active = 1;
                    //publish resume
                    ResumeHelper.publishResume($scope,$rootScope,"/publish_resume/"+resume.id)
                }  else{
                    resume.active = 0;
                    resume.$save().$then(function(data){
                        var meta = data.$metadata.meta;
                        MessageService.setAlertMessage($scope,meta);
                    });
                }

            }

            $scope.setDefault = function(resume, isDefault){
                if(isDefault) {
                    resume.default = 1;
                    //publish resume
                    ResumeHelper.publishResume($scope,$rootScope,"/default_resume/"+resume.id)
                }  else{
                    resume.default = 0;
                    resume.$save().$then(function(data){
                        var meta = data.$metadata.meta;
                        MessageService.setAlertMessage($scope,meta);
                    });
                }

            }

            $scope.cloneResume = function(resume){
                ResumeHelper.cloneResume($scope,$rootScope,"/clone_resume/"+resume.id);
            }

            $scope.showResumeEditForm = function(resume){
                $scope.showedEditResumeForm = true;
                $rootScope.$emit("editResume",resume);
            }



            $scope.closeAfterUpdate = function(){
                $scope.showedEditResumeForm = false;
            }

            $scope.closeAfterCreate = function(){
                $scope.showedResumeForm = false;
            }

            /*$scope.$watch('$viewContentLoaded', function()
            {
                console.log("loading");
            });*/

        }
    }
}

module.exports = resumeDirective;