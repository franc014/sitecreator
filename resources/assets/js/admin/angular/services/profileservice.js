
var profileService = function(restmod){
    return restmod.model('/profile').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = profileService;
