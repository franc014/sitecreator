var seleablePrice = function(restmod){
    return restmod.model('/saleableprice').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    }).mix({
        ammount: {decode:'NumberFormat'},
        discount:{decode:'NumberFormat'}
    });
}
module.exports = seleablePrice;