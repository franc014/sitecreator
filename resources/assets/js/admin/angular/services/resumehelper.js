var resumeHelper = function($http,MessageService){

    return {
        dropDownList:function(path,scope){
            $http.get(path).success(function(data){
                scope.resumes = data.resumes;
                scope.resume = scope.resumes[5];
            }).error();
        },
        getResume:function(scope,rootScope,path){
            $http.get(path).then(function(data){
                var resume = data.data.resume;

                if(resume === null) {
                    rootScope.$emit("noResumeFound");
                }else{
                    rootScope.$emit("resumeChange", data.data);
                }
            });

        },
        publishResume:function(scope,rootScope,path){
            $http.post(path).success(function(data){
                var meta = data.meta;
                MessageService.setAlertMessage(scope,meta);
            }).error();

        },
        cloneResume:function(scope,rootScope,path){
            $http.post(path).success(function(data){
                rootScope.$emit("resumeChange",data);
                var meta = data.meta;
                MessageService.setAlertMessage(scope,meta);

            }).error();
        }
        /*unpublishResume:function(scope,rootScope,path){
            $http.post(path).success(function(data){
                console.log("unpu");
            }).error();
        }*/
    }
}

module.exports = resumeHelper;