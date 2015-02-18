
var bioController = function($scope,BiographyService,MessageService){

    $scope.customFormOptions = {
        validationsTemplate: '../../js/admin/angular/templates/customValidationTemplate.html'
    };

    var data = BiographyService.$find(0);

    $scope.profile = data.$fetch();

    $scope.updateBio = function(){
        data.$save().$then(function(data){
            var meta = data.$metadata;
            MessageService.setAlertMessage($scope,meta);
        });
    }
}

module.exports = bioController;