var numberFormat = function(){
    return function(_value) {
        var numberFormatted = parseFloat(_value);
        return numberFormatted;
    }
}
module.exports = numberFormat;
