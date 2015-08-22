var saleableAllDetails = function($scope,$rootScope,SaleableDetailsService,MessageService,FileProcessor){

    $scope.onFileSelect = function($files) {
        $scope.files = $files;

    };
    $scope.hasIcon = false;
    var saleable_id = $scope.saleable.id;
    var details = SaleableDetailsService.$search({saleable_id:saleable_id}).$then(function(data){
        var items_number = data.length;

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
        $scope.files = [];
        //download detail icon to load
        FileProcessor.download($scope,'/saleabledetail/'+detail.id+'/icon');
        //$scope.descriptiveIcon = "";
        $scope.showDetailForm = true;
        $scope.detail = detail;
        $scope.updateDetail = function(){
            detail.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
                //upload file
                if($scope.files.length > 0){
                    FileProcessor.upload($scope,'/uploadSaleableDetailIcon',data.id);
                    $scope.files = [];
                }

            });
        }
    }

    $scope.newDetail = function(){
        $scope.hasIcon = false;
        $scope.showDetailForm = true;
        $scope.files = [];
        console.log($scope.files.length);
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
                if($scope.files.length > 0){
                    FileProcessor.upload($scope,'/uploadSaleableDetailIcon',data.id);
                    $scope.files = [];
                }


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
