var saleableBasic = function(){
    return {
        restrict:"EA",
        templateUrl:"../../js/admin/angular/templates/saleable_details_list.html",
        replace:true,
        scope:{saleable:"="},
        controller:"saleableAllDetailsCtrl"

    }
}
module.exports = saleableBasic;