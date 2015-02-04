var datePickerDirective = function(LocalDatePicker){
    return {
        restrict:"EA",
        link:function(scope,element,attrs){
            var localization = LocalDatePicker.getTranslation();
            var format = attrs.datePickerFormat;
            var region = "es";
            $.datepicker.regional[region]=localization;
            element.datepicker($.datepicker.regional['es']);
            element.datepicker('option','dateFormat',format);

        }
    }
}

module.exports = datePickerDirective;