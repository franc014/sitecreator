
var homeController = function($scope,UserService,UserContentType){
    //console.log($scope);
    $scope.showAlert = true;
    $scope.noProfileMsge = 'Este es tu primera sesión en este panel de control. '+
    'Por favor, a continuación completa tus datos personales.'+
        'Si no deseas actualizar tus datos, puedes hacerlo en otro momento desde [Perfil] y'+
    'continuar con las otras opciones de este panel de control.';



}

module.exports = homeController;