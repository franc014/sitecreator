var hallo = function(){
    return {
        require: 'ngModel',
        link: function ($scope, $element, $attrs, ngModelCtrl) {
            console.log($element);
            $(this).hallo({
                plugins: {
                    'halloformat': {},
                    'halloblock': {},
                    'hallojustify': {},
                    'hallolists': {},
                    'halloreundo': {}
                }
            });

            ngModelCtrl.$render = function () {
                var contents = ngModelCtrl.$viewValue;
                $(this).hallo('setContents', contents);
            }


        }
    }
}
module.exports = hallo