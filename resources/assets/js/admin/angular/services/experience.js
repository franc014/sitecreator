var experienceService = function(restmod){
    return restmod.model('/experience').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = experienceService;