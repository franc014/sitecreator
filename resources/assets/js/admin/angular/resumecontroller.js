var resumeController = function($scope,$rootScope,ResumeHelper,MessageService){

    ResumeHelper.getResumePub($scope,$rootScope,'/publishedresume');
    ResumeHelper.dropDownList('/resume_drop_list',$scope);
    $scope.resume = 89;

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
