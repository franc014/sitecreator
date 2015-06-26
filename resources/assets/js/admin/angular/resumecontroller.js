var resumeController = function($scope,$rootScope,ResumeHelper){
    ResumeHelper.dropDownList('/resume_drop_list',$scope);
    ResumeHelper.getResume($scope,$rootScope,'/publishedresume');

    $rootScope.$on("updateResumeList",function(){
        ResumeHelper.dropDownList('/resume_drop_list',$scope);
    });

    $scope.getResume = function(id){
        var data = {
          resume:{
              id:id
          }
        };
        //console.log(data);
        $rootScope.$emit("resumeChange",data);
    }

}

module.exports = resumeController;
