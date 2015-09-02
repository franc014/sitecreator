var HomeCallOutService = function(restmod){
    return restmod.model('/homecallout').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
};
module.exports = HomeCallOutService;