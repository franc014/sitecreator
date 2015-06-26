var skillService = function(restmod){
    return restmod.model('/skill').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = skillService;