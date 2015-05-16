var saleableBasicCtrl = function($scope,$rootScope,SaleableService,MessageService){

    $rootScope.$on("newBasicDetail",function(event){
        //var numberOfSaleables = $scope.$parent.saleables.length;
        var saleable = SaleableService.$build();
        saleable.type =0;
        saleable.featured = 0;

        /*if(numberOfSaleables==0){

        }*/
        //$scope.saleable = angular.copy($scope.master);
        $scope.saleable = saleable;



        $scope.updateSaleable = function(){

            if($scope.saleable.isfeatured){
                $scope.saleable.featured = 1;
            }else{
                $scope.saleable.featured = 0;
            }
            saleable.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
                $rootScope.$emit("saleableCreated",saleable);

            });
        }

    });

    $rootScope.$on("editBasicDetail",function(event,saleable){
        $scope.saleable = saleable;
        $scope.updateSaleable = function(){

            if($scope.saleable.isfeatured){
                $scope.saleable.featured = 1;
            }else{
                $scope.saleable.featured = 0;
            }
            saleable.$save().$then(function(data){

                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
                $rootScope.$emit("saleableUpdated",saleable);

            });
        }

    });



}

module.exports = saleableBasicCtrl;
