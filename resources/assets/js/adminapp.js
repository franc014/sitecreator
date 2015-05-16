'use strict'
var JQuery = require('jquery');
var angular = require('./../vendor/angular/angular-index.js');
var angular_restmod = require('./../vendor/angular-restmod/dist/angular-restmod-bundle.js');
var res_style = require('./../vendor/angular-restmod/dist/styles/ams.min.js');
var stc_messages = require('./config/messages.js');


var ngFabForm = require('./../vendor/ng-fab-form/dist/ng-fab-form.min.js');
var ngMessages = require('./../vendor/angular-messages/angular-messages.min.js');

var textAngular = require('./../vendor/textAngular/dist/textAngular-rangy.min.js');
var sanitize = require('./../vendor/textAngular/dist/textAngular-sanitize.min.js');
var rangy = require('./../vendor/textAngular/dist/textAngular.min.js');

var uploadLibp1 = require('../vendor/angularjs-file-upload/angular-file-upload-shim.min.js');
var uploadLibp2 = require('../vendor/angularjs-file-upload/angular-file-upload.min.js');


var prfXyzApp = angular.module('prfXyzApp',['restmod','ngFabForm','ngMessages','textAngular','angularFileUpload']);

prfXyzApp.config(['restmodProvider','$httpProvider','ngFabFormProvider',function(restmodProvider, $httpProvider,ngFabFormProvider) {
    restmodProvider.rebase('AMSApi');
    $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    restmodProvider.rebase('DefaultPacker');

    ngFabFormProvider.extendConfig({
        validationsTemplate : '../../js/admin/angular/templates/customValidationTemplate.html'
        /*,setFormDirtyOnSubmit: true*/
    });

    $httpProvider.interceptors.push(function($q,$rootScope,$timeout) {
        return {
            'request': function(config) {
                $rootScope.showSystemAlert = false;
                $rootScope.showSpinner = true;
                return config;
            },

            'response': function(response) {
                $rootScope.showSpinner = false;
                return response;
            },
            'requestError':function(rejection){
                console.log(rejection);
                return $q.reject(rejection);
            },
            'responseError':function(rejection){

                var status = rejection.status;
                switch (status){
                    case 401:
                        $rootScope.showSpinner = false;
                        $rootScope.showSystemAlert = true;
                        $rootScope.systemAlert = "Ha caducado tu sesión. Debes ingresar nuevamente!";
                        $timeout(function(){
                            location.href = "/auth/logout";
                        },4000);
                        break;
                    case 500:
                        $rootScope.showSpinner = false;
                        $timeout(function(){
                            $rootScope.showSystemAlert = false;
                        },3000);
                        $rootScope.showSystemAlert = true;
                        $rootScope.systemAlert = "Vaya! :( Hubo un problema en la respuesta del servidor. <br>" +
                        "Por favor intenta la acción nuevamente o contacta al Administrador";
                        break;
                    case 404:
                        $rootScope.showSpinner = false;
                        $timeout(function(){
                            $rootScope.showSystemAlert = false;
                        },3000);
                        $rootScope.showSystemAlert = true;
                        $rootScope.systemAlert = "Vaya! :( No se encontró el servicio que requieres. <br>" +
                        "Por favor intenta la acción nuevamente o contacta al Administrador";
                        break;
                    /*case 413:
                        //$rootScope.messageType = 'danger';
                        //$rootScope.fileTooLarge = true;
                        //$rootScope.fileTooLargeMessage = "Está intentando subir un archivo demasiado pesado. El archivo no debe superar los 5MB";
                        alert("Está intentando subir un archivo demasiado pesado. El archivo no debe superar los 5MB");
                        location.reload();
                        break;*/
                    default :
                        $rootScope.showSpinner = false;
                        $timeout(function(){
                            $rootScope.showSystemAlert = false;
                        },3000);
                        $rootScope.showSystemAlert = true;
                        $rootScope.systemAlert = "Se detectó un problema de conexión. <br>" +
                        "Por favor comprueba que estás conectada/o a una red. Si persisten los problemas, <br> por favor contacta al Administrador.";


                }
                return $q.reject(rejection);

            }
        };
    });

}]);

var homeController = require('./admin/angular/homecontroller');
var bioController = require('./admin/angular/biocontroller');
var userController = require('./admin/angular/usercontroller');
var configController = require('./admin/angular/configcontroller');
var saleableController = require('./admin/angular/saleablecontroller');
var saleableDetailController = require('./admin/angular/saleabledetailcontroller');
var saleableBasicController = require('./admin/angular/basicdetailcontroller');
var saleableAllDetailsController = require('./admin/angular/saleablealldetailscontroller');
var saleablePriceController = require('./admin/angular/saleablepricescontroller');

var messageService = require('./admin/angular/services/messageservice');
var userService = require('./admin/angular/services/userservice');
var userContentTypeService = require('./admin/angular/services/usercontenttypeservice');
var profileService = require('./admin/angular/services/profileservice');
var saleableService = require('./admin/angular/services/saleableservice');
var bioService = require('./admin/angular/services/biographyservice');
var thePacker = require('./admin/angular/services/thepacker');
var saleableDetailService = require('./admin/angular/services/saleabledetails');
var saleablePriceService = require('./admin/angular/services/saleableprice');
var newPassword = require('./admin/angular/services/newpasswordservice');
var numberFormat = require('./admin/angular/services/formatfilterservice');
var fileProcessor = require('./admin/angular/services/fileprocessor');

var alertDirective = require('./admin/angular/directives/alertdirective');
var closeContentDirective = require('./admin/angular/directives/closecontentdirective');
var contentSelectorDirective = require('./admin/angular/directives/contentselector');
var prodileMenuDirective = require('./admin/angular/directives/profilemenu');
var configMenuDirective = require('./admin/angular/directives/configmenu');

var saleableDetails = require('./admin/angular/directives/saleabledetails');
var saleableBasic = require('./admin/angular/directives/saleablebasic');
var saleableDetailsList = require('./admin/angular/directives/saleabledetailslist');
var saleablePricesList = require('./admin/angular/directives/saleablepriceslist');
var halloEditor = require('./admin/angular/directives/hallodirective');


prfXyzApp.factory('Messages',[stc_messages]);
prfXyzApp.factory('MessageService',['Messages','$timeout',messageService]);
prfXyzApp.factory('UserService',['restmod',userService]);
prfXyzApp.factory('ProfileService',['restmod',profileService]);
prfXyzApp.factory('SaleableService',['restmod',saleableService]);
prfXyzApp.factory('SaleableDetailsService',['restmod',saleableDetailService]);
prfXyzApp.factory('SaleablePriceService',['restmod',saleablePriceService]);
prfXyzApp.factory('UserContentType',['restmod',userContentTypeService]);
prfXyzApp.factory('BiographyService',['restmod',bioService]);
prfXyzApp.factory('ThePacker',[thePacker]);
prfXyzApp.factory('NewPassword',['$http',newPassword]);
prfXyzApp.factory('NumberFormatFilter',[numberFormat]);
prfXyzApp.factory('FileProcessor',['$upload','$http','MessageService',fileProcessor]);

prfXyzApp.directive('alert',[alertDirective]);
prfXyzApp.directive('closeContent',[closeContentDirective]);
prfXyzApp.directive('contentSelector',['MessageService','UserContentType',contentSelectorDirective]);
prfXyzApp.directive('profileMenu',[prodileMenuDirective]);
prfXyzApp.directive('configMenu',[configMenuDirective]);
prfXyzApp.directive('saleableDetails',['$templateCache','$compile','$rootScope',saleableDetails]);
prfXyzApp.directive('saleableBasic',['SaleableService',saleableBasic]);
prfXyzApp.directive('saleableDetailsList',[saleableDetailsList]);
prfXyzApp.directive('saleablePricesList',[saleablePricesList]);
prfXyzApp.directive('hallo',[halloEditor]);

prfXyzApp.controller('HomeCtrl',['$scope','UserService','UserContentType',homeController]);
prfXyzApp.controller('BioCtrl',['$scope','BiographyService','MessageService',bioController]);
prfXyzApp.controller('UserCtrl',['$scope','$timeout','UserService','ProfileService','MessageService','NewPassword',userController]);
prfXyzApp.controller('ConfigCtrl',['$scope','$timeout','MessageService','UserContentType',configController]);

prfXyzApp.controller('SaleableCtrl',['$scope','$rootScope','$timeout','SaleableService','MessageService','SaleableDetailsService',saleableController]);
prfXyzApp.controller('SaleableDetailCtrl',['$scope','$rootScope','SaleableService','MessageService','$element','$compile',saleableDetailController]);
prfXyzApp.controller('saleableBasicCtrl',['$scope','$rootScope','SaleableService','MessageService',saleableBasicController]);
prfXyzApp.controller('saleableAllDetailsCtrl',['$scope','$rootScope','SaleableDetailsService','MessageService','FileProcessor',saleableAllDetailsController]);
prfXyzApp.controller('saleablePriceCtrl',['$scope','$rootScope','SaleablePriceService','MessageService',saleablePriceController]);