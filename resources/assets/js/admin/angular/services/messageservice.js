var messageService = function(Messages,$timeout){
    return {
        get:function (name) {
            return Messages.filter(function( obj ) {
            // coerce both obj.id and id to numbers
            // for val & type comparison
                //return +obj.name === +name;
                return obj.name === name;
            })[ 0 ];
        },
        setAlertMessage:function(scope,data){
            scope.ShowResultAlert = true;
            scope.result = data;
            $timeout(function(){
                scope.ShowResultAlert = false;
            },4000);
        },
        setServerValidationMessage:function(scope){
            scope.ShowServerErrors = true;
            scope.result = "Los datos no se pudieron guardar"+
                           " debido a los siguientes errores. Por favor corrígelos.";
            $timeout(function(){
                scope.ShowServerErrors = false;
            },5000);
        },
        setNoItemsInfoMessage:function(scope,datatype,additional){
            scope.showNoItemsAlert = true;
            scope.result = "No se han encontrado "+datatype+additional;
            $timeout(function(){
                scope.showNoItemsAlert = false;
            },8000);
        },
        setConfirmDeleteMessage:function(item, additional){
            return confirm("Realmente deseas eliminar este/a"+item+"?. "+additional+"");
        }

    }
};
module.exports = messageService;
