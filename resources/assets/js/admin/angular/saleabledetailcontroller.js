var saleableDetailCtrl = function($scope,$rootScope,SaleableService,MessageService,$element,$compile){

    $rootScope.$on('newDetails',function(){

        $scope.saleable = {};
        $rootScope.$broadcast('newBasicDetail');
    });

    $rootScope.$on('saleableCreated',function(event,data){
        $scope.saleables.$refresh();
        $scope.saleable = data;
    });
    $rootScope.$on('editDetails',function(event,saleable){
        $scope.saleable = saleable;
        $scope.saleables.$refresh();
        $rootScope.$broadcast('editBasicDetail',saleable);
    })


}

module.exports = saleableDetailCtrl;
