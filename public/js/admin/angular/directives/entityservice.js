var entityService = function($http,$upload,$timeout,Container,Message,FormObject){
        //extends service Container.
        var entity = Object.create(Container);
        //checking server validation
        var verifyPost = function (data,scope,entity,action){

            if(data.hasOwnProperty('error')){

                if(action=='update'){
                    FormObject.getOriginalItem(scope,data,entity);
                };
                //console.log(scope.item);
                Message.showValidationMessages(scope,data,entity);
            }else{
                if(data.hasOwnProperty('fileError')){
                    Message.showFileErrorMsge(scope,data);
                }
                    if(action=='update'){

                        //console.log
                        //updating the resource
                        scope.master = data.item.item;
                        FormObject.setEditedItem(scope,data,entity);
                        //FormObject.setScopeData(scope,data,entity);
                        scope.showListItem = true;
                        scope.showEditForm = false;
                        Message.showEditedMessage(scope,data);
                        FormObject.initializeEditForm(scope,'topic');
                    }else{
                    //if it's the first item created
                        if(scope.firstItem!=null) {
                            scope.hasNotItems = false;
                        }
                        //scope.items.unshift(data['item'].item);
                        FormObject.setListItem(scope,data,entity);
                        //Entity
                        Message.showAddedMessage(scope,data);
                        FormObject.initializeForm(scope,entity);
                        scope.showForm = false;
                    }
                //},3000);

                    /*scope.items.push(data['item'].item);
                    */

            }
        };

        entity.getItem = function(scope,action){
            var item = {};
            item = scope.formData;
            scope.disableSaveButton=true;
            return item;
        },

        //add item
        entity.storeItem = function(scope,path,entity,action){
            var item = this.getItem(scope,action);
            //$files: an array of files selected, each file has name, size, and type.
            //if uploads a file
            if(scope.files != null){
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
                        data: item
                    }).progress(function(evt) {
                        scope.getPercentage = function () {
                            return parseInt(100.0 * evt.loaded / evt.total);
                        }
                    }).success(function(data) {
                        //scope.added = true;
                        verifyPost(data,scope,entity,action);

                    });
                //}
            }else{ //if doesn't upload a file'

                $http({
                    method: 'POST',
                    url:path,
                    data:item
                }).
                    success(function(data) {
                        verifyPost(data,scope,entity,action);
                    });
            }

        };
        //destroy an item
        entity.destroy = function(scope,path,index,id,entity){
            //console.log(scope);
            //set id for deleting
            var item = {
                id:id
            };
            //deleting promise
            $http({method: 'POST', url: path,data:item}).
                success(function(data, status, headers, config) {
                    //remove from ng-repeat tree
                    //scope.items.splice(index,1);
                    FormObject.removeListItem(scope,index,entity);
                    Message.enableDeleteAlertMessage(data,scope);
                    //set hidden of item id deleted
                    scope.deletedItemId = data.item.item.id;
                });
        };
        //restore an item

        entity.restore = function(scope,path,entity){
            scope.restored = true;
            //retrieve hidden topic id
            var id = scope.deletedItemId;
            //set tpic id
            var item = {
                id:id
            };
            //promise to restore de topic
            $http({method: 'POST', url: path,data:item}).
                success(function(data, status, headers, config) {
                    //hide alert
                    console.log(data);
                    scope.showdel=false;
                    //add topic item
                    //scope.items.unshift(data);
                    FormObject.setListItem(scope,data,entity);
                    //$scope.topics.splice(data.id,1);
                })
        };

        //restore an item from detail

        entity.restoreFromDetail = function(scope,path){
            scope.restored = true;
            //retrieve hidden topic id
            var id = scope.deletedItemId;
            //set tpic id
            var item = {
                id:id
            };
            //promise to restore de topic
            $http({method: 'POST', url: path,data:item}).
                success(function(data, status, headers, config) {
                    //hide alert
                    console.log(data);
                    FormObject.setFormData(scope,data,'post',true);
                    scope.showdel=false;
                    scope.showListItem = true;
                    scope.showComments = true;
                }).
                error(function(data, status, headers, config) {
                    console.log("err...");
                });
        };

        //show an item (single object)
        /*entity.showItem = function(scope,path,entity,hasForm){
            $http({method: 'GET', url: path}).
                success(function(data, status, headers, config) {
                    FormObject.setFormData(scope,data,entity,hasForm);
                }).
                error(function(data, status, headers, config) {
                    console.log("err...");
                });
        };*/



        return entity;
    };

module.exports = entityService;