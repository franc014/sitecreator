var categoryDirective = function(MessageService,Category,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/configuration/categories.html",
        restrict:"EA",
        scope:{},
        controller:function($scope,$rootScope) {
            $scope.closeForm = function(){
                Helper.enableForm($scope,false);
            }
            Helper.enableForm($scope,false);
                    var categories = Category.$search().$then(function (data) {
                        $scope.categories = data;
                        if ($scope.categories.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " categorías",
                                ". Pulsa el botón Nueva para crear una");
                        }
                    });

                    $scope.newCategory = function () {
                        Helper.enableForm($scope, true);
                        var category = Category.$build();
                        $scope.category = category;

                        $scope.updateCategory = function () {
                            category.$save().$then(function (data) {
                                $scope.categories.$refresh();
                                $scope.categoryForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }

                    };

                    $scope.editCategory = function (category) {
                        Helper.enableForm($scope, true);
                        $scope.category = category;

                        $scope.updateCategory = function () {

                            category.$save().$then(function (data) {
                                $scope.categories.$refresh();
                                $scope.categoryForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //delete
                    $scope.removeCategory = function (category) {
                        $scope.category = category;
                        var confirmation = MessageService.setConfirmDeleteMessage(" categoría", " ");
                        if (confirmation) {
                            category.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //change status
                    /*$scope.changeStatus = function ($event, category) {
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        category.status = action;
                        category.$save().$then(function (data) {
                            $scope.categories.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };*/

        }
    }

}
module.exports = categoryDirective;
