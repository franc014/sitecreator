var saleableBasicCtrl = function($scope,$rootScope,SaleableService,MessageService,CategoryHelper){

    $rootScope.$on("newBasicDetail",function(event){
        CategoryHelper.categoryList('/salcatlist',$scope);

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
            console.log($scope.saleable.categories);
            saleable.$save().$then(function(data){
                var meta = data.$metadata.meta;
                MessageService.setAlertMessage($scope,meta);
                $rootScope.$emit("saleableCreated",saleable);

            });
        }

    });

    $rootScope.$on("editBasicDetail",function(event,saleable){
        CategoryHelper.categoryList('/salcatlist',$scope);
        CategoryHelper.salCategoryList('/salcatlistselected/'+saleable.id,$scope);
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
