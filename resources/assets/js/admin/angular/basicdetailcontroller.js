var saleableBasicCtrl = function($scope,$rootScope,SaleableService,MessageService){

    $rootScope.$on("newBasicDetail",function(event){

        var saleable = SaleableService.$build();
        saleable.type =0;
        //$scope.saleable = angular.copy($scope.master);
        $scope.saleable = saleable;
        $scope.updateSaleable = function(){
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
            saleable.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
                $rootScope.$emit("saleableUpdated",saleable);

            });
        }

    });



}

module.exports = saleableBasicCtrl;
