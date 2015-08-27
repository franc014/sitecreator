var portfolioController = function($scope,$rootScope){
    $scope.shownProjectList = true;
    $scope.showProjectWizard = function(){
        $scope.shownProjectList = false;
        $scope.shownProjectWizard = true;

    }

    $scope.hideProjectWizard = function(){
        $scope.shownProjectList = true;
        $scope.shownProjectWizard = false;
    }



}

module.exports = portfolioController;
