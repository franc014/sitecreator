var userController = function($scope,$timeout,UserService, ProfileService,MessageService,NewPassword){

    var user = UserService.$find(0);
    var profile = ProfileService.$find(0);
    $scope.profile = profile.$fetch();
    $scope.user = user.$fetch();

    $scope.updateUser = function(){

        user.$save().$then(function(data){
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
        },function(data){
            $scope.errors = data.$response.data;
            MessageService.setServerValidationMessage($scope);
        });
    }

    $scope.updatePassword = function(){
        var changedPassword = {
          password:$scope.password
        };
        var newPassword = NewPassword.updatePassword(user.id,changedPassword);
        newPassword.success(function(data){
            var meta = data.meta;
            MessageService.setAlertMessage($scope,meta);
            $timeout(function(){
                $scope.password = "";
                $scope.showPasswordChange = false;
            },4000);
        });
    }
    $scope.updatePersonalInfo = function(){
        profile.$save().$then(function(data){
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
        },function(data){
            $scope.errors = data.$response.data;
            MessageService.setServerValidationMessage($scope);
        });
    }
    $scope.updateSocialInfo = function(){
        profile.$save().$then(function(data){
            var meta = data.$metadata.meta;
            MessageService.setAlertMessage($scope,meta);
        },function(data){
            $scope.errors = data.$response.data;
            MessageService.setServerValidationMessage($scope);
        });
    }

}

module.exports = userController;
