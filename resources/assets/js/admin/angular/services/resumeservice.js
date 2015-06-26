var resumeService = function(restmod){
    return restmod.model('/resume').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = resumeService;