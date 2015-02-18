
var userService = function(restmod){
    return restmod.model('/user').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = userService;