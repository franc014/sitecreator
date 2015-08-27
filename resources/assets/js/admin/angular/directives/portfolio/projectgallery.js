var projectGalleryDirective = function(MessageService,Project,$timeout,FileProcessor,Gallery){
    return {
        templateUrl:"../../js/admin/angular/templates/portfolio/projectgallery.html",
        restrict:"EA",
        scope:{},
        controller:function($scope,$rootScope) {
            function loadImages(data) {
                $scope.project = data;
                var images = Gallery.$search({project_id: $scope.project.id}).$then(function (data) {
                    $scope.images = data;
                    if ($scope.images.length == 0) {
                        MessageService.setNoItemsInfoMessage($scope, " imágenes",
                            ". Pulsa el botón 'Chose files' para cargar nuevas imágenes");
                    }

                });
                $scope.onFileSelect = function ($files) {
                    $scope.files = $files;
                    FileProcessor.upload($scope, '/uploadProjectGalleryImage', data.id);

                };

                $scope.removeImage = function (image) {

                    var confirmation = MessageService.setConfirmDeleteMessage(" imagen", " ");
                    if (confirmation) {
                        image.$destroy().$then(function (data) {
                            var meta = data.$response.data;
                            MessageService.setAlertMessage($scope, meta);
                            $scope.images.$refresh();
                        });
                    }
                };
            }

            $rootScope.$on('editProject',function(evt,data){
                loadImages(data);
            });
            $rootScope.$on('projectCreated',function(evt,data){
                loadImages(data);
            });
        }
    }

}
module.exports = projectGalleryDirective;
