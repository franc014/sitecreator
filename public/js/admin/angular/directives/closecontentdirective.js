var closeContentDirective = function(){
    return {
        restrict:'EA',
        template:'<a href="" ng-click="destroySection()" class="glyphicon glyphicon-remove pull-right remove-button"  ></a>',

        scope:{remove:'&'},
        controller:function($scope){
            $scope.destroySection = function(){
                $scope.remove();
            }
        }
    }
}

module.exports = closeContentDirective;
