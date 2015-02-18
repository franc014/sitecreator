var bioService = function(restmod){
    return restmod.model('/biography')/*.mix('DefaultPacker',{
     $config:{jsonMeta: '.'}
     })*/;
}
module.exports = bioService;