'use strict'
var $ = require('jquery');
//var pusherf = require('../components/pusher/dist/pusher-index.js');


var angular = require('./../vendor/angular/angular-index.js');
var angular_restmod = require('./../vendor/angular-restmod/dist/angular-restmod-bundle.js');
var res_style = require('./../vendor/angular-restmod/dist/styles/ams.min.js');
var stc_messages = require('./config/messages.js');


var ngFabForm = require('./../vendor/ng-fab-form/dist/ng-fab-form.min.js');
var ngMessages = require('./../vendor/angular-messages/angular-messages.min.js');
//var dropzone = require('./../vendor/dropzone/dist/min/dropzone.min.js');
//var jquery_aupload_file = require('./../vendor/jquery-uploadfile/js/jquery.uploadfile.min.js');
//var jquery_file_upload = require('./../vendor/jquery-file-upload/js/jquery.fileupload.js');


var prfXyzApp = angular.module('prfXyzApp',['restmod','ngFabForm','ngMessages']);

prfXyzApp.config(['restmodProvider','$httpProvider','ngFabFormProvider',function(restmodProvider, $httpProvider,ngFabFormProvider) {
    restmodProvider.rebase('AMSApi');
    $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    restmodProvider.rebase('DefaultPacker');

    ngFabFormProvider.extendConfig({
        validationsTemplate : '../../js/admin/angular/templates/customValidationTemplate.html'
        /*,setFormDirtyOnSubmit: true*/
    });

}]);

var homeController = require('./admin/angular/homecontroller');
var bioController = require('./admin/angular/biocontroller');
var userController = require('./admin/angular/usercontroller');
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

var alertDirective = require('./admin/angular/directives/alertdirective');
var closeContentDirective = require('./admin/angular/directives/closecontentdirective');
var contentSelectorDirective = require('./admin/angular/directives/contentselector');
var prodileMenuDirective = require('./admin/angular/directives/profilemenu');

var saleableDetails = require('./admin/angular/directives/saleabledetails');
var saleableBasic = require('./admin/angular/directives/saleablebasic');
var saleableDetailsList = require('./admin/angular/directives/saleabledetailslist');
var saleablePricesList = require('./admin/angular/directives/saleablepriceslist');

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

prfXyzApp.directive('alert',[alertDirective]);
prfXyzApp.directive('closeContent',[closeContentDirective]);
prfXyzApp.directive('contentSelector',['MessageService','UserContentType',contentSelectorDirective]);
prfXyzApp.directive('profileMenu',[prodileMenuDirective]);
prfXyzApp.directive('saleableDetails',['$templateCache','$compile','$rootScope',saleableDetails]);
prfXyzApp.directive('saleableBasic',['SaleableService',saleableBasic]);
prfXyzApp.directive('saleableDetailsList',[saleableDetailsList]);
prfXyzApp.directive('saleablePricesList',[saleablePricesList]);

prfXyzApp.controller('HomeCtrl',['$scope','UserService','UserContentType',homeController]);
prfXyzApp.controller('BioCtrl',['$scope','BiographyService','MessageService',bioController]);
prfXyzApp.controller('UserCtrl',['$scope','$timeout','UserService','ProfileService','MessageService','NewPassword',userController]);
prfXyzApp.controller('SaleableCtrl',['$scope','$rootScope','$timeout','SaleableService','MessageService','SaleableDetailsService',saleableController]);
prfXyzApp.controller('SaleableDetailCtrl',['$scope','$rootScope','SaleableService','MessageService','$element','$compile',saleableDetailController]);
prfXyzApp.controller('saleableBasicCtrl',['$scope','$rootScope','SaleableService','MessageService',saleableBasicController]);
prfXyzApp.controller('saleableAllDetailsCtrl',['$scope','$rootScope','SaleableDetailsService','MessageService',saleableAllDetailsController]);
prfXyzApp.controller('saleablePriceCtrl',['$scope','$rootScope','SaleablePriceService','MessageService',saleablePriceController]);