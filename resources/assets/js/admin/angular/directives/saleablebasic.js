var saleableBasic = function(SaleableService){
    return {
        restrict:"EA",
        templateUrl:"../../js/admin/angular/templates/saleable_basic.html",
        replace:true,
        controller:"saleableBasicCtrl",
        scope:{}

    }
}
module.exports = saleableBasic;