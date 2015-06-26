var resumeHelper = function($http,MessageService){

    return {
        dropDownList:function(path,scope){
            $http.get(path).success(function(data){
                scope.resumes = data.resumes;
                scope.resume = scope.resumes[5];
            }).error();
        },
        getResume:function(scope,rootScope,path){
            $http.get(path).success(function(data){
                if(data.error=="") {
                    rootScope.$emit("resumeChange", data);
                }else{
                    rootScope.$emit("noResumeFound");
                }
            }).error(function(data){
                console.log(data);
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