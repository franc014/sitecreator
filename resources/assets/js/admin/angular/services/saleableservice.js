var seleableService = function(restmod){
    return restmod.model('/saleable').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = seleableService;