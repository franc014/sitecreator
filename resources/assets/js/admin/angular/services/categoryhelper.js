var categoryHelper = function($http){

    return {
        categoryList:function(path,scope){
            $http.get(path).success(function(data){
                scope.catoptions = data.categories;
            }).error();
        },
        salCategoryList:function(path,scope){
            $http.get(path).success(function(data){
                var cats = data.categories;
                scope.saleable.categories = cats;
            }).error();
        },
        projectCategoryList:function(path,scope){
        $http.get(path).success(function(data){
            var cats = data.categories;
            scope.project.categories = cats;
        }).error();
    }

    }
}

module.exports = categoryHelper;