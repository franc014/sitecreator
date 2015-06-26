var contentSelector = function(MessageService){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/resume_selector.html",
        restrict:"EA",
        scope:{},
        transclude:true,
        controller:function($scope,$timeout){
            $scope.infoResumeSelector = MessageService.get('resumeselector_info').message;
            //TODO get sections according to user resume

            var sections = [
                {alias:"Experiencia",link:"experience"},
                {alias:"Estudios",link:"study"},
                {alias:"Habilidades / Conocimientos",link:"skills"},
                {alias:"Idiomas",link:"languages"},
                {alias:"Intereses Profesionales",link:"personal"}
            ];
            $scope.sections = sections;


        }
    }
}

module.exports = contentSelector;