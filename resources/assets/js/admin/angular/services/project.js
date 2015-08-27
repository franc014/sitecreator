var projectService = function(restmod){
    return restmod.model('/project').mix('DefaultPacker',{
        $config:{jsonMeta: '.'}
    });
}
module.exports = projectService;