
var bioService = function(restmod){
    return restmod.model('/bio').mix('DefaultPacker',{
     $config:{jsonMeta: '.'}

     });
}
module.exports = bioService;