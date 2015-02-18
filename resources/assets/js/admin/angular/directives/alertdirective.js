/**
 * Created by macintosh on 2/3/15.
 */
var alertDirective = function(){
    return {
        templateUrl:"../../js/admin/angular/templates/alert.html",
        restrict:"EA",
        scope : {
            message:"=msge"
        },

        controller:function($scope){

            $scope.showAlert = true;
            $scope.destroyAlert = function(){
                $scope.$parent.showAlert = false;
            }
        }
    }
}
module.exports = alertDirective;
