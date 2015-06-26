var educationDirective = function(MessageService,Education,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/education.html",
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
                    var educations = Education.$search({resume_id: resumeId}).$then(function (data) {
                        $scope.educations = data;
                        if ($scope.educations.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " estudios",
                                ". Pulsa el botón Nueva para crear una");
                        }
                    });

                    $scope.newEducation = function () {
                        Helper.enableForm($scope, true);
                        var education = Education.$build({resume_id: resumeId, initdate: '', enddate: ''});
                        $scope.education = education;
                        $scope.monthoptions = Helper.months();
                        $scope.education.initmonth = Helper.months()[0];
                        $scope.education.endmonth = Helper.months()[0];

                        $scope.updateEducation = function () {
                            var isCurrent = $scope.education.currentplace;
                            $scope.education.current = 0;
                            if (isCurrent) {
                                $scope.education.current = 1;
                            }
                            $scope.education.initdate = $scope.education.initmonth + "-" + $scope.education.inityear;
                            $scope.education.enddate = $scope.education.endmonth + "-" + $scope.education.endyear;

                            education.$save().$then(function (data) {
                                $scope.educations.$refresh();
                                $scope.educationForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }

                    };

                    $scope.editEducation = function (education) {
                        Helper.enableForm($scope, true);
                        $scope.monthoptions = Helper.months();
                        var imonthIndex = Helper.months().indexOf(education.imonth);
                        var emonthIndex = Helper.months().indexOf(education.emonth);
                        $scope.education = education;
                        $scope.education.initmonth = $scope.monthoptions[imonthIndex];
                        $scope.education.endmonth = $scope.monthoptions[emonthIndex];
                        $scope.education.inityear = education.iyear;
                        $scope.education.endyear = education.eyear;

                        $scope.updateEducation = function () {
                            var isCurrent = $scope.education.currentplace;
                            $scope.education.current = 0;
                            if (isCurrent) {
                                $scope.education.current = 1;
                            }
                            $scope.education.initdate = $scope.education.initmonth + "-" + $scope.education.inityear;
                            $scope.education.enddate = $scope.education.endmonth + "-" + $scope.education.endyear;

                            education.$save().$then(function (data) {
                                $scope.educations.$refresh();
                                $scope.educationForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //delete
                    $scope.removeEducation = function (education) {
                        $scope.education = education;
                        var confirmation = MessageService.setConfirmDeleteMessage(" estudio", " ");
                        if (confirmation) {
                            education.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //change status
                    $scope.changeStatus = function ($event, education) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        education.status = action;
                        education.$save().$then(function (data) {
                            $scope.educations.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };

                }
            });




        }
    }

}
module.exports = educationDirective;
