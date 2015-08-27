var fileProcessor = function($upload,$http,MessageService,$timeout){
    return {
        upload:function(scope,path,data){

                var files = scope.files[0];
                scope.fileerrors = [];
                var numberOfFiles = scope.files.length;
                if(numberOfFiles > 1 && numberOfFiles < 8) {
                    files = scope.files;
                }else if(numberOfFiles > 7){
                    console.log("no cargue asiiiii");
                }
                console.log(files);
                for (var i = 0; i < scope.files.length; i++) {
                        var file = scope.files[i];
                        //var file = scope.files;
                        scope.upload = $upload.upload({
                            url: path, //upload.php script, node.js route, or servlet url
                            method: 'POST', //or 'PUT',
                            file: file,
                            data: data
                        }).progress(function(evt) {
                            scope.getPercentage = function () {
                                return parseInt(100.0 * evt.loaded / evt.total);
                            }
                        }).success(function(data) {
                            scope.hasIcon = true;
                            scope.descriptiveImage = data.img;
                            scope.getPercentage=function () {
                                return 0;
                            };
                            scope.images.$refresh();
                        }).error(function(data){
                            MessageService.setServerValidationMessage(scope);
                            scope.fileerrors.push(data);
                            $timeout(function(){
                                scope.fileerrors.splice(0,scope.fileerrors.length)
                            },10000);

                        });
                }


        },
        download:function(scope,path){
                $http.get(path).success(function(data){
                    scope.descriptiveImage = data.img;
                })
                .error(function(data){
                    console.log(data);
                });

        }


    }
}
module.exports = fileProcessor;