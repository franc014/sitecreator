var contentSelector = function(MessageService,UserContentType){
    return {
        templateUrl:"../../js/admin/angular/templates/content_selector.html",
        restrict:"EA",
        scope:{},
        transclude:true,
        controller:function($scope,$timeout){
            $scope.infoContentSelector = MessageService.get('contentselector_info').message;
            var contenttypes = UserContentType.$search().$then(function(data){
                $scope.usercontenttypes = data;
            });

            $scope.updateContent = function($event,usercontent){

                var checkbox = $event.target;
                var action = (checkbox.checked ? true: false);

                usercontent.active = action;
                usercontent.$save().$then(function(data){
                    var meta = data.$metadata.meta;
                    MessageService.setAlertMessage($scope,meta);
                });

            }

        }
    }
}

module.exports = contentSelector;