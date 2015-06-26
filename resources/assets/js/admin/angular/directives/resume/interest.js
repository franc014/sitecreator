var interestDirective = function(MessageService,Interest,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/interests.html",
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
                    var interests = Interest.$search({resume_id: resumeId}).$then(function (data) {
                        $scope.interests = data;
                        if ($scope.interests.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " intereses profesionales",
                                ". Pulsa el botón Nuevo para crear uno");
                        }
                    });

                    $scope.newInterest = function () {
                        Helper.enableForm($scope, true);
                        var interest = Interest.$build({resume_id: resumeId});
                        $scope.interest = interest;

                        $scope.updateInterest = function () {
                            interest.$save().$then(function (data) {
                                $scope.interests.$refresh();
                                $scope.interestForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }

                    };

                    $scope.editInterest = function (interest) {
                        Helper.enableForm($scope, true);
                        $scope.interest = interest;

                        $scope.updateInterest = function () {

                            interest.$save().$then(function (data) {
                                $scope.interests.$refresh();
                                $scope.interestForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //delete
                    $scope.removeInterest = function (interest) {
                        $scope.interest = interest;
                        var confirmation = MessageService.setConfirmDeleteMessage(" idioma", " ");
                        if (confirmation) {
                            interest.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //change status
                    $scope.changeStatus = function ($event, interest) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        interest.status = action;
                        interest.$save().$then(function (data) {
                            $scope.interests.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };

                }
            });




        }
    }

}
module.exports = interestDirective;
