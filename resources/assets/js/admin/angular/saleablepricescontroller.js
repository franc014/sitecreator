var saleablePrices = function($scope,$rootScope,SaleablePriceService,MessageService){

    /*var reset = function(){
        $scope.saleablePriceForm.$setPristine();
        $scope.price = angular.copy({});
    }*/

    var saleable_id = $scope.saleable.id;
    var prices = SaleablePriceService.$search({saleable_id:saleable_id}).$then(function(data){
        var items_number = data.length;
        if(items_number==0){
            //var linkToNew = ". Crea ya uno nuevo!";
            MessageService.setNoItemsInfoMessage($scope,"precios"," .Crea uno nuevo!");
        }
    }).$resolve();

    $scope.saleable.prices = prices;

    var price = SaleablePriceService.$build();
    price.saleable_id = saleable_id;
    $scope.price = price;

    $scope.updatePrice = function(){
        price.$save().$then(function(data){
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
            prices.$refresh();
        });
    }

    $scope.editPrice=function(price){
        $scope.showPriceForm = true;
        $scope.price = price;
        $scope.updatePrice = function(){
            price.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
            });
        }
    }

    $scope.newPrice = function(){
        $scope.showPriceForm = true;
        //$scope.saleablePriceForm.$setPristine();
        var price = SaleablePriceService.$build();
        price.saleable_id = saleable_id;
        $scope.price = price;

        $scope.updatePrice = function(){
            price.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
                prices.$refresh();
                $scope.showPriceForm = false;
            });
        }
    }

    $scope.removePrice = function(price){
        var confirmation = MessageService.setConfirmDeleteMessage(" precio"," ");
        if(confirmation){
            price.$destroy().$then(function(data){
                var meta = data.$response.data;

                MessageService.setAlertMessage($scope,meta);
                //s$scope.saleablePriceForm.$setPristine();

                var price = SaleablePriceService.$build();
                price.saleable_id = saleable_id;
                $scope.price = price;
                $scope.updatePrice = function(){
                    price.$save().$then(function(data){
                        var meta = data.$metadata.meta;
                        MessageService.setAlertMessage($scope,meta);
                        prices.$refresh();
                        $scope.showPriceForm = false;
                    });
                }

            });
        }
    }






}

module.exports = saleablePrices;
