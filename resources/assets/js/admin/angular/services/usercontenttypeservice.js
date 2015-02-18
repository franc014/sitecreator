var userContentType = function(restmod){
    return restmod.model('/usercontenttype').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}

module.exports = userContentType;


