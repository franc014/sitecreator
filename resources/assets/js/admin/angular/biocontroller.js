
var bioController = function($scope,BiographyService,MessageService){


    var data = BiographyService.$find(0);

    $scope.profile = data.$fetch();

    $scope.updateBio = function(){
        data.$save().$then(function(data){

            var meta = data.$metadata.meta;

            MessageService.setAlertMessage($scope,meta);

        });
    }
}

module.exports = bioController;