var saleableAllDetails = function($scope,$rootScope,SaleableDetailsService,MessageService){

    /*var reset = function(){
        $scope.saleableDetailForm.$setPristine();
        $scope.detail = angular.copy({});
    }*/

    var saleable_id = $scope.saleable.id;
    var details = SaleableDetailsService.$search({saleable_id:saleable_id}).$then(function(data){
        var items_number = data.length;
        console.log(items_number);
        if(items_number==0){
            //var linkToNew = ". Crea ya uno nuevo!";
            MessageService.setNoItemsInfoMessage($scope,"detalles"," .Crea uno nuevo!");
        }
    }).$resolve();
    $scope.saleable.details = details;

    var detail = SaleableDetailsService.$build();
    detail.saleable_id = saleable_id;
    detail.type = 0;
    $scope.detail = detail;


    $scope.updateDetail = function(){
        detail.$save().$then(function(data){
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
            details.$refresh();
        });
    }

    $scope.editDetail=function(detail){
        $scope.showDetailForm = true;
        $scope.detail = detail;
        $scope.updateDetail = function(){
            detail.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
            });
        }
    }

    $scope.newDetail = function(){
        $scope.showDetailForm = true;
        //$scope.saleableDetailForm.$setPristine();
        var detail = SaleableDetailsService.$build();
        detail.saleable_id = saleable_id;
        detail.type = 0;
        $scope.detail = detail;

        $scope.updateDetail = function(){
            detail.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
                details.$refresh();
                $scope.showDetailForm = false;
            });
        }
    }

    $scope.removeDetail = function(detail){
        var confirmation = MessageService.setConfirmDeleteMessage("detalle"," ");
        if(confirmation){
            detail.$destroy().$then(function(data){
                var meta = data.$response.data;
                MessageService.setAlertMessage($scope,meta);
                //$scope.saleableDetailForm.$setPristine();

                var detail = SaleableDetailsService.$build();
                detail.saleable_id = saleable_id;
                detail.type = 0;
                $scope.detail = detail;
                $scope.updateDetail = function(){
                    detail.$save().$then(function(data){
                        var meta = data.$metadata.meta;
                        MessageService.setAlertMessage($scope,meta);
                        details.$refresh();
                        //$rootScope.$emit('saleableUpdated');
                    });
                }

            });
        }
    }






}

module.exports = saleableAllDetails;
