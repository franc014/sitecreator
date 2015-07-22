var bioDirective = function(MessageService,Bio,$timeout,Helper,$http){
    return {
        templateUrl:"../../js/admin/angular/templates/biographies/biographies.html",
        restrict:"EA",
        scope:{},
        controller:function($scope,$rootScope) {
            $scope.closeForm = function(){
                Helper.enableForm($scope,false);
            }
            Helper.enableForm($scope,false);

                    var bios = Bio.$search().$then(function (data) {
                        console.log(data);
                        $scope.bios = data;
                        if ($scope.bios.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " biografías",
                                ". Pulsa el botón Nueva para crear una");
                        }
                    });



                    $scope.newBio = function () {

                        Helper.enableForm($scope, true);
                        var bio = Bio.$build();
                        $scope.bio = bio;

                        $scope.updateBio = function () {

                            bio.$save().$then(function (data) {
                                $scope.bios.$refresh();
                                $scope.bioForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }

                    };

                    $scope.editBio = function (bio) {
                        Helper.enableForm($scope, true);
                        $scope.bio = bio;

                        $scope.updateBio = function () {

                            bio.$save().$then(function (data) {
                                $scope.bios.$refresh();
                                $scope.bioForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //delete
                    $scope.removeBio = function (bio) {
                        $scope.bio = bio;
                        var confirmation = MessageService.setConfirmDeleteMessage(" biografía", " ");
                        if (confirmation) {
                            bio.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                $scope.bios.$refresh();
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //change status
                    $scope.changeStatus = function ($event, bio) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        bio.status = action;
                        bio.$save().$then(function (data) {
                            $scope.bios.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };

                    $scope.setDef = function ($event, bio) {
                        console.log("aqui");
                        /*var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        bio.status = action;*/
                        $http.post("/biography/setDefault/"+bio.id).success(function(data){
                            $scope.bios.$refresh();
                            console.log(data);
                            var meta = data.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };






        }
    }

}
module.exports = bioDirective;
