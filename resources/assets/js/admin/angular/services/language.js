var languageService = function(restmod){
    return restmod.model('/language').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = languageService;