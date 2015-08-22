var categoryService = function(restmod){
    return restmod.model('/cat').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = categoryService;