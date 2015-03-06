var saleablePrices = function(){
    return {
        restrict:"EA",
        templateUrl:"../../js/admin/angular/templates/saleable_prices_list.html",
        replace:true,
        scope:{saleable:"="},
        controller:"saleablePriceCtrl"

    }
}
module.exports = saleablePrices