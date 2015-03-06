var saleableDetails = function($templateCache,$compile,$rootScope){
    return {
        transclude: 'element'    ,
        restrict:"EA",
        templateUrl:"../../js/admin/angular/templates/saleable_details.html",
        replace:true,

        controller:"SaleableDetailCtrl",
        link:function(scope,$element,$attrs,$ctrl,transclude){
            $rootScope.$on("newBasicDetail",function(event) {
                $('#tabsf a[href="#pilltab1"]').tab('show');
            })

        }
    }
}
module.exports = saleableDetails;