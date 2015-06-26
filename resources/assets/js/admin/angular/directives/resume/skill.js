var skillDirective = function(MessageService,Skill,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/skills.html",
        restrict:"EA",
        scope:{},
        controller:function($scope,$rootScope) {
            $scope.closeForm = function(){
                Helper.enableForm($scope,false);
            }
            Helper.enableForm($scope,false);
            $rootScope.$on('resumeChange',function(event,args){
                if(typeof args.resume !== "undefined") {
                    var resumeId = args.resume.id;
                    var skills = Skill.$search({resume_id: resumeId}).$then(function (data) {
                        $scope.skills = data;
                        if ($scope.skills.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " habilidades",
                                ". Pulsa el botón Nueva para crear una");
                        }
                    });

                    $scope.newSkill = function () {
                        Helper.enableForm($scope, true);
                        var skill = Skill.$build({resume_id: resumeId});
                        $scope.skill = skill;

                        $scope.updateSkill = function () {
                            skill.$save().$then(function (data) {
                                $scope.skills.$refresh();
                                $scope.skillForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }

                    };

                    $scope.editSkill = function (skill) {
                        Helper.enableForm($scope, true);
                        $scope.skill = skill;

                        $scope.updateSkill = function () {

                            skill.$save().$then(function (data) {
                                $scope.skills.$refresh();
                                $scope.skillForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //delete
                    $scope.removeSkill = function (skill) {
                        $scope.skill = skill;
                        var confirmation = MessageService.setConfirmDeleteMessage(" habilidad", " ");
                        if (confirmation) {
                            skill.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //change status
                    $scope.changeStatus = function ($event, skill) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        skill.status = action;
                        skill.$save().$then(function (data) {
                            $scope.skills.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };

                }
            });




        }
    }

}
module.exports = skillDirective;
