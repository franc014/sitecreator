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
            },2000);
        }
    }
};
module.exports = messageService;
