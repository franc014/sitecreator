'use strict';

var JQuery = require('jquery');
var angular = require('./../vendor/angular/index.js');
var angular_restmod = require('./../vendor/angular-restmod/dist/angular-restmod-bundle.js');
var res_style = require('./../vendor/angular-restmod/dist/styles/ams.min.js');
var stc_messages = require('./config/messages.js');


var ngFabForm = require('./../vendor/ng-fab-form/dist/ng-fab-form.min.js');
var ngMessages = require('./../vendor/angular-messages/angular-messages.min.js');
/*var froala = require('./../vendor/angular-froala/src/angular-froala.js');
var froalasan = require('./../vendor/angular-froala/src/froala-sanitize.js');*/
/*var textAngular = require('./../vendor/textAngular/dist/textAngular-rangy.min.js');
var sanitize = require('./../vendor/textAngular/dist/textAngular-sanitize.min.js');
var rangy = require('./../vendor/textAngular/dist/textAngular.min.js');*/
/*var sanitize = require('./../vendor/textAngular/dist/textAngular-sanitize.min.js');*/
var uploadLibp1 = require('../vendor/angularjs-file-upload/angular-file-upload-shim.min.js');
var uploadLibp2 = require('../vendor/angularjs-file-upload/angular-file-upload.min.js');


var nganimate = require('./../vendor/angular_animate/angular-animate.min.js');

window.rangy = require('rangy/lib/rangy-core');
window.rangy.saveSelection = require('rangy/lib/rangy-selectionsaverestore');

require('textangular/dist/textAngular-sanitize.min');
require('textangular/dist/textAngular.min');
require('textangular/dist/textAngularSetup');
var prfXyzApp = angular.module('prfXyzApp',['restmod','ngFabForm','ngMessages', 'angularFileUpload','ngAnimate','textAngular']);

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

var resumeController = require('./admin/angular/resumecontroller');
var portfolioController = require('./admin/angular/portfoliocontroller');
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
var resumeService = require('./admin/angular/services/resumeservice');
var resumeHelper = require('./admin/angular/services/resumehelper');
var categoryHelper = require('./admin/angular/services/categoryhelper');
var experienceService = require('./admin/angular/services/experience');
var helpersService = require('./admin/angular/services/helpers');
var educationService = require('./admin/angular/services/education');
var skillService = require('./admin/angular/services/skill');
var languageService = require('./admin/angular/services/language');
var interestService = require('./admin/angular/services/interest');
var categoryService = require('./admin/angular/services/category');
var projectService = require('./admin/angular/services/project');
var galleryService = require('./admin/angular/services/gallery');
var homeCalloutService = require('./admin/angular/services/homecallout');

var alertDirective = require('./admin/angular/directives/alertdirective');
var closeContentDirective = require('./admin/angular/directives/closecontentdirective');
var contentSelectorDirective = require('./admin/angular/directives/contentselector');
var prodileMenuDirective = require('./admin/angular/directives/profilemenu');
var configMenuDirective = require('./admin/angular/directives/configmenu');
var categoryDirective = require('./admin/angular/directives/configuration/category');
var projectListDirective = require('./admin/angular/directives/portfolio/projectlist');
var projectWizardDirective = require('./admin/angular/directives/portfolio/projectwizard');
var projectDirective = require('./admin/angular/directives/portfolio/project');
var projectGalleryDirective = require('./admin/angular/directives/portfolio/projectgallery');
var homePageDirective = require('./admin/angular/directives/homepage/homecalls');

var resumeSelectorDirective = require('./admin/angular/directives/resume/resumeselector');
var resumeDirective = require('./admin/angular/directives/resume/resumedirective');
var resumeEditForm = require('./admin/angular/directives/resume/resumeeditform');
var resumeForm = require('./admin/angular/directives/resume/resumeform');
var resumeExperience = require('./admin/angular/directives/resume/experience');
var resumeSections = require('./admin/angular/directives/resume/sections');
var resumeEducation = require('./admin/angular/directives/resume/education');
var resumeSkill = require('./admin/angular/directives/resume/skill');
var resumeLanguage = require('./admin/angular/directives/resume/language');
var resumeInterest = require('./admin/angular/directives/resume/interest');
var bioDirective = require('./admin/angular/directives/biographies/biography');
var resumeList = require('./admin/angular/directives/resume/resumelist');

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
prfXyzApp.factory('FileProcessor',['$upload','$http','MessageService','$timeout',fileProcessor]);
prfXyzApp.factory('Resume',['restmod',resumeService]);
prfXyzApp.factory('Experience',['restmod',experienceService]);
prfXyzApp.factory('ResumeHelper',['$http','MessageService',resumeHelper]);
prfXyzApp.factory('CategoryHelper',['$http',categoryHelper]);
prfXyzApp.factory('Helper',[helpersService]);
prfXyzApp.factory('Education',['restmod',educationService]);
prfXyzApp.factory('Skill',['restmod',skillService]);
prfXyzApp.factory('Language',['restmod',languageService]);
prfXyzApp.factory('Interest',['restmod',interestService]);
prfXyzApp.factory('Category',['restmod',categoryService]);
prfXyzApp.factory('Project',['restmod',projectService]);
prfXyzApp.factory('Gallery',['restmod',galleryService]);
prfXyzApp.factory('Homecallout',['restmod',homeCalloutService]);

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
prfXyzApp.directive('resumeSelector',['MessageService',resumeSelectorDirective]);
prfXyzApp.directive('resume',['MessageService','Resume','$timeout','ResumeHelper',resumeDirective]);
prfXyzApp.directive('resumeEditForm',['MessageService','Resume','ResumeHelper','$timeout',resumeEditForm]);
prfXyzApp.directive('resumeForm',['MessageService','Resume','ResumeHelper','$timeout',resumeForm]);
prfXyzApp.directive('resumeExperience',['MessageService','Experience','$timeout','Helper',resumeExperience]);
prfXyzApp.directive('resumeSections',['Resume',resumeSections]);
prfXyzApp.directive('resumeEducation',['MessageService','Education','$timeout','Helper',resumeEducation]);
prfXyzApp.directive('resumeSkill',['MessageService','Skill','$timeout','Helper',resumeSkill]);
prfXyzApp.directive('resumeLanguage',['MessageService','Language','$timeout','Helper',resumeLanguage]);
prfXyzApp.directive('resumeInterest',['MessageService','Interest','$timeout','Helper',resumeInterest]);
prfXyzApp.directive('biography',['MessageService','BiographyService','$timeout','Helper','$http',bioDirective]);
prfXyzApp.directive('resumeList',['MessageService','Resume','$timeout','Helper',resumeList]);
prfXyzApp.directive('categoryManager',['MessageService','Category','$timeout','Helper',categoryDirective]);
prfXyzApp.directive('projectList',['MessageService','Project','$timeout','Helper',projectListDirective]);
prfXyzApp.directive('projectWizard',['MessageService','Project','$timeout','Helper',projectWizardDirective]);
prfXyzApp.directive('project',['MessageService','Project','$timeout','CategoryHelper','FileProcessor','Helper',projectDirective]);
prfXyzApp.directive('projectGallery',['MessageService','Project','$timeout','FileProcessor','Gallery',projectGalleryDirective]);
prfXyzApp.directive('homePage',['MessageService','Homecallout','$timeout','Helper','FileProcessor','$http',homePageDirective]);

prfXyzApp.controller('HomeCtrl',['$scope','UserService','UserContentType',homeController]);
prfXyzApp.controller('BioCtrl',['$scope','BiographyService','MessageService',bioController]);
prfXyzApp.controller('UserCtrl',['$scope','$timeout','UserService','ProfileService','MessageService','NewPassword',userController]);
prfXyzApp.controller('ConfigCtrl',['$scope','$timeout','MessageService','UserContentType',configController]);

prfXyzApp.controller('SaleableCtrl',['$scope','$rootScope','$timeout','SaleableService','MessageService','SaleableDetailsService',saleableController]);
prfXyzApp.controller('SaleableDetailCtrl',['$scope','$rootScope','SaleableService','MessageService','$element','$compile',saleableDetailController]);
prfXyzApp.controller('saleableBasicCtrl',['$scope','$rootScope','SaleableService','MessageService','CategoryHelper',saleableBasicController]);
prfXyzApp.controller('saleableAllDetailsCtrl',['$scope','$rootScope','SaleableDetailsService','MessageService','FileProcessor',saleableAllDetailsController]);
prfXyzApp.controller('saleablePriceCtrl',['$scope','$rootScope','SaleablePriceService','MessageService',saleablePriceController]);
prfXyzApp.controller('resumeCtrl',['$scope','$rootScope','ResumeHelper','MessageService',resumeController]);
prfXyzApp.controller('PortfolioCtrl',['$scope','$rootScope',portfolioController]);