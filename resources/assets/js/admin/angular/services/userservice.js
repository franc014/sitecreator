/**
 * Created by macintosh on 2/3/15.
 */
var userService = function(restmod){
    return restmod.model('/user').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = userService;