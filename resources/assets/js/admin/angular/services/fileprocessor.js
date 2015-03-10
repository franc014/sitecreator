var fileProcessor = function($upload,$http,MessageService){
    return {
        upload:function(scope,path,data){

                var files = scope.files[0];
                var numberOfFiles = scope.files.length;
                if(numberOfFiles > 1 && numberOfFiles < 8) {
                    files = scope.files;
                }else if(numberOfFiles > 7){
                    console.log("no cargue asiiiii");
                }
                //for (var i = 0; i < scope.files.length; i++) {
                //var file = scope.files[i];
                var file = scope.files;
                scope.upload = $upload.upload({
                    url: path, //upload.php script, node.js route, or servlet url
                    method: 'POST', //or 'PUT',
                    file: files,
                    data: data
                }).progress(function(evt) {
                    scope.getPercentage = function () {
                        return parseInt(100.0 * evt.loaded / evt.total);
                    }
                }).success(function(data) {
                    scope.descriptiveIcon = data.img;
                }).error(function(data){
                    MessageService.setServerValidationMessage(scope);
                    scope.errors = data;
                });


        },
        download:function(scope,path){
                $http.get(path).success(function(data){
                    scope.descriptiveIcon = data.img;
                })
                .error(function(data){
                    console.log(data);
                });

        }


    }
}
module.exports = fileProcessor;