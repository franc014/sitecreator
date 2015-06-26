var helperService = function(){
    return {
        months:function(){
            var months = ["enero","febrero","marzo","abril",
                "mayo","junio","julio","agosto",
                "septiembre","octubre","noviembre","diciembre"];
            return months;
        },
        enableForm:function(scope,status){
            if(status){
                scope.gridShown = false;
                scope.formShown = true;
            }else{
                scope.gridShown = true;
                scope.formShown = false;
            }
        },
        getCheckButtonStatus:function(event){
            var checkbox = event.target;
            var action = (checkbox.checked ? true: false);
            return action;
        }
    }
}
module.exports = helperService;