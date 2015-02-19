
var bioController = function($scope,BiographyService,MessageService){

    $scope.customFormOptions = {
        validationsTemplate: '../../js/admin/angular/templates/customValidationTemplate.html'
    };

    var data = BiographyService.$find(0);

    $scope.profile = data.$fetch();
    console.log($scope.profile);
    $scope.updateBio = function(){
        data.$save().$then(function(data){

            var meta = data.$metadata.meta;

            MessageService.setAlertMessage($scope,meta);

        });
    }
}

module.exports = bioController;