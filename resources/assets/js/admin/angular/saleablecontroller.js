var saleableController = function($scope,$rootScope,$timeout,
                                  SaleableService,MessageService){
    $scope.master = {};

    var saleables = SaleableService.$search().$then(function(data){
        //console.log(data.length);
        var items_number = data.length;
        if(items_number==0){
            var linkToNew = ". Crea ya uno nuevo!";
            MessageService.setNoItemsInfoMessage($scope,"servicios o productos",linkToNew);

        }/*else{
            $scope.saleables = data;

        }*/
    });

    $scope.saleables = saleables;

    $scope.removeSaleable = function(saleable){
        var confirmation = MessageService.setConfirmDeleteMessage(" servicio o producto"," Se destruirán también todos sus detalles.");
        if(confirmation){
            saleable.$destroy().$then(function(data){
                var meta = data.$response.data;
                MessageService.setAlertMessage($scope,meta);
            });
        }
    }

    //Details
    //new: create a new details "wizard" instance
    $scope.newDetails = function(){
        $scope.showDetails = true;
        $rootScope.$broadcast('newDetails');
    }
    //edit: wizard, edit fashion
    $scope.editDetails = function(saleable){
        $scope.showDetails = true;
        $rootScope.$broadcast('editDetails',saleable);
    }

    //close wizard
    $scope.closeWizard = function(){
        $scope.showDetails = false;
        location.href = '/admin/services';
    }


}
module.exports = saleableController;