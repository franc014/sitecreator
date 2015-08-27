var sectionsDirective = function(Resume){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/sections.html",
        restrict:"EA",
        scope:{},

        controller:function($scope,$rootScope){
            $rootScope.$on('resumeChange',function(event,args) {

                if (typeof args.resume !== "undefined"){
                    var resume = Resume.$find(args.resume.id);
                    $scope.resume = resume.$resolve();
                    $rootScope.$broadcast("resumeChange2");



                 }
            });
        },
        link:function(scope,element){
            //$(element).effect("highlight", {}, 3000);
        }
    }

}
module.exports = sectionsDirective;
