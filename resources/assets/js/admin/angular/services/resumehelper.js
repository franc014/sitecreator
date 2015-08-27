var resumeHelper = function($http,MessageService){

    return {
        dropDownList:function(path,scope){
            $http.get(path).success(function(data){
                scope.resumes = data.resumes;
                scope.resume = scope.resumes[89];
            }).error();
        },
        bioDropDownList:function(path,scope){
            $http.get(path).success(function(data){
                scope.bios = data.bios;
            }).error();
        },
        getResumePub:function(scope,rootScope,path){

            $http.get(path).success(function(data){

                var resume = data.resume;

                if(resume === null) {
                    rootScope.$emit("noResumeFound");
                }else{

                    rootScope.$emit("resumeChange", data);
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
                rootScope.$emit("updateResumeList",data);
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