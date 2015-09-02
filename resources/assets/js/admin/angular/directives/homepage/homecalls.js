var homeCallsDirective = function(MessageService,Homecallout,$timeout,Helper,FileProcessor,$http){
    return {
        templateUrl:"../../js/admin/angular/templates/homepage/homecalls.html",
        restrict:"EA",
        scope:{},
        controller:function($scope,$rootScope) {

            $scope.onFileSelect = function($files) {
                $scope.files = $files;

            };
            $scope.closeForm = function(){
                Helper.enableForm($scope,false);
            };
            Helper.enableForm($scope,false);

            $http.get('/activecontent').success(function(data){
                var contents = data.contents;
                $scope.contents = contents;
            }).error();



                    var callouts = Homecallout.$search().$then(function (data) {
                        $scope.callouts = data;
                        if ($scope.callouts.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " ítems",
                                ". Pulsa el botón Nuevo para crear uno");
                        }
                        if ($scope.callouts.length == 1) {
                            $scope.hideIfOne = true;
                        }

                    });

                    $scope.newHomecallout = function () {

                        Helper.enableForm($scope, true);
                        var callout = Homecallout.$build();
                        $scope.callout = callout;
                        $scope.callout.buttonlink = 'home';
                        $scope.updateHomecallout = function () {
                            /*console.log($scope.callout);*/
                            callout.$save().$then(function (data) {
                                $scope.hideIfOne = true;
                                $scope.callouts.$refresh();
                                $scope.calloutForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                                if(typeof $scope.files !== "undefined") {
                                    if($scope.files.length > 0){
                                        FileProcessor.upload($scope,'/uploadHomeImage',data.id);
                                        $scope.files = [];
                                    }
                                }

                            });
                        }

                    };

                    $scope.editHomecallout = function (callout) {
                        Helper.enableForm($scope, true);
                        $scope.callout = callout;
                        $scope.files = [];
                        FileProcessor.download($scope,'/homeimage/'+callout.id);
                        $scope.updateHomecallout = function () {

                            callout.$save().$then(function (data) {
                                $scope.callouts.$refresh();
                                $scope.calloutForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                                if(typeof $scope.files !== "undefined") {
                                    if($scope.files.length > 0){
                                        FileProcessor.upload($scope,'/uploadHomeImage',data.id);
                                        $scope.files = [];
                                    }
                                }

                            });
                        }
                    };

                    //delete
                    $scope.removeHomecallout = function (callout) {
                        $scope.callout = callout;
                        var confirmation = MessageService.setConfirmDeleteMessage(" ítem", " ");
                        if (confirmation) {
                            $scope.hideIfOne = false;
                            callout.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                MessageService.setAlertMessage($scope, meta);

                            });
                        }
                    };

                    //change status
                    $scope.changeStatus = function ($event, callout) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        callout.status = action;
                        callout.$save().$then(function (data) {
                            $scope.callouts.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };
        }
    }

};
module.exports = homeCallsDirective;
