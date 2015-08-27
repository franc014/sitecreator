var galleryService = function(restmod){
    return restmod.model('/galimage').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = galleryService;