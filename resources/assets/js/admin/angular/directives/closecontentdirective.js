var closeContentDirective = function(){
    return {
        restrict:'EA',
        template:'<a href="" ng-click="destroySection()" class="pull-right remove-button" data-icon="&#xe70d" ></a>',

        scope:{remove:'&'},
        controller:function($scope){
            $scope.destroySection = function(){
                $scope.remove();
            }
        }
    }
}

module.exports = closeContentDirective;
