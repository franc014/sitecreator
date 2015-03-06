var seleableDetails = function(restmod){
    return restmod.model('/saleabledetail').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = seleableDetails;