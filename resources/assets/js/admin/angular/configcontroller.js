var configController = function($scope,$timeout,MessageService,UserContentType){

    var contenttypes = UserContentType.$search().$then(function(data){
        $scope.usercontenttypes = data;
    });

    $scope.editUserContent = function(content){
        $scope.content = content;
        $scope.showEditContentItem = true;
    }
    $scope.updateUserContent = function(){
        var isHome = $scope.content.ishome;
        var asHome = false;
        $scope.content.ashome = 0;
        if(isHome){
            $scope.content.ashome = 1;
        }
        $scope.content.$save().$then(function(data){
            $scope.usercontenttypes.$refresh();
            $scope.showEditContentItem = false;
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
        });
    }

    $scope.changeStateContent = function($event,usercontent){
        var checkbox = $event.target;
        var action = (checkbox.checked ? true: false);

        usercontent.active = action;
        usercontent.$save().$then(function(data){
            $scope.usercontenttypes.$refresh();
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
        });
    }
    $scope.setAsHome = function($event,usercontent){
        var checkbox = $event.target;
        var action = (checkbox.checked ? true: false);

        usercontent.ashome = action;
        usercontent.$save().$then(function(data){
            $scope.usercontenttypes.$refresh();
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
        });
    }

}
module.exports = configController;

