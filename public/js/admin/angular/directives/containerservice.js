var containerService = function($http,CustomMessage){

    function load(path){
        return $http.get(path);
    }
    function isEmpty(obj){
        return angular.equals([],obj);
    }
    return {
        /*if object is empty*/
        isEmpty:function(obj){
            return angular.equals([],obj);
        },
        /* post list*/
        list:function(path, paginate,reset, scope){
            if(paginate){
                //page to retrieve
                var page = scope.currentPage + 1;
                //don't show reset buttom yet
                scope.showReset = true;
                return load(path+"?page="+page);
            }else{
                if(reset){
                    scope.showReset = false;
                    scope.showMore = true;
                    return load(path);
                }
                scope.showReset = false;
                scope.showMore = true;
                return load(path);
            }
        },
        paginate:function(scope,data){
            //page to retrieve
            var page = scope.currentPage + 1;
            //last page in iterator
            var lastPage = data.last_page;
            //if iterator doesn't get to the end, show buttom "Mostrar más"
            if(lastPage > page ){
                scope.showMore = true;
            }else{
                scope.showMore = false;
            }

            //set current page
            scope.currentPage = data.current_page;
            //scope.items = scope.items.concat(data.data);
            CustomMessage.disableAlertMessage(scope);
            //return scope.items.concat(data.data);
            return data.data;
        },
        setList:function(scope,data,itemsPerPage){
            //console.log(data.total);
            scope.showMore = false;
            //number of items in iterator
            var numberItems = data.total; //8
            //items per page
            //console.log(itemsPerPage);
            var interval = itemsPerPage; //3
            //if total is greater than the number of items per page
            if(numberItems > interval){
                //console.log("pagina uno..");
                scope.showMore = true;
            }
            //set scope variable for current page
            scope.currentPage = data.current_page;
            CustomMessage.disableAlertMessage(scope);
            //give ng-repeat the model inside iterator
            //scope.items = data.data;
            return data.data;

        },
        setEmptyList:function(scope){
            scope.pageDivider = true;
            return [];
        },
        showList:function(scope,data, paginate,location){
            scope.showListItem = true;
            if(isEmpty(data[0].data) && !paginate){
                CustomMessage.showMessages(scope,data[1]);
                scope.showMore = false;
                return this.setEmptyList(scope);
            }else{
                /*pagination*/
                if(paginate){
                    return this.paginate(scope,data[0]);
                }else{
                    //data object contains iterator array
                    //don't show reset buttom yet
                    return this.setList(scope,data[0],data[0].per_page);
                }
            }
        }
    }

};

module.exports = containerService;
