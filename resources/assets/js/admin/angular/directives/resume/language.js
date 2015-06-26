var languageDirective = function(MessageService,Language,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/languages.html",
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
                    var languages = Language.$search({resume_id: resumeId}).$then(function (data) {
                        $scope.languages = data;
                        if ($scope.languages.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " idiomas",
                                ". Pulsa el botón Nuevo para crear uno");
                        }
                    });

                    $scope.newLanguage = function () {
                        Helper.enableForm($scope, true);
                        var language = Language.$build({resume_id: resumeId});
                        $scope.language = language;

                        $scope.updateLanguage = function () {
                            language.$save().$then(function (data) {
                                $scope.languages.$refresh();
                                $scope.languageForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }

                    };

                    $scope.editLanguage = function (language) {
                        Helper.enableForm($scope, true);
                        $scope.language = language;

                        $scope.updateLanguage = function () {

                            language.$save().$then(function (data) {
                                $scope.languages.$refresh();
                                $scope.languageForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //delete
                    $scope.removeLanguage = function (language) {
                        $scope.language = language;
                        var confirmation = MessageService.setConfirmDeleteMessage(" idioma", " ");
                        if (confirmation) {
                            language.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //change status
                    $scope.changeStatus = function ($event, language) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        language.status = action;
                        language.$save().$then(function (data) {
                            $scope.languages.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };

                }
            });




        }
    }

}
module.exports = languageDirective;
