var timePicker = function(){
    return {
        restrict:"EA",
        link:function(scope,element,attrs){
            element.timepicker({ myPosition: 'left top'});
            /*ngModelCtrl.$render = function () {
                element.datepicker('setDate', ngModelCtrl.$modelValue);
            }*/
        }
    }
}
module.exports = timePicker;