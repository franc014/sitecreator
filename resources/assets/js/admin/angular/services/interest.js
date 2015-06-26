var interestService = function(restmod){
    return restmod.model('/interest').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = interestService;