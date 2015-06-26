var educationService = function(restmod){
    return restmod.model('/education').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = educationService;