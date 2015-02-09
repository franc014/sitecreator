/**
 * Created by macintosh on 1/28/15.
 */
var homeController = function($scope,UserService){
    //console.log($scope);
    $scope.showAlert = true;
    $scope.noProfileMsge = 'Este es tu primera sesión en este panel de control. '+
    'Por favor, a continuación completa tus datos personales.'+
        'Si no deseas actualizar tus datos, puedes hacerlo en otro momento desde [Perfil] y'+
    'continuar con las otras opciones de este panel de control.';


    var user = UserService.$find(49);
    var users = UserService.$search().$then(function(users){
        console.log(users.$status);
        $scope.users = users;
        //console.log(users.$status);
    });
    //users.$resolve();




    //console.log();
    //alert($scope.users.$status);

    //console.log(UserService.$find(49));
    //user.$then(function() {
        //expect(user.email).toBeDefined();
        //console.log(user.$resolve());
    //});
    //$scope.user = user;
    /*$scope.$watch('user',function(){
        console.log(user);
    },true);*/
    $scope.saveUser = function(){

        /*user.$save().$then(function(data){
            console.log(data);
        });*/
        user.$save();
    }

}

module.exports = homeController;