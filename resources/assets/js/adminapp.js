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

prfXyzApp.config(['restmodProvider','$httpProvider',function(restmodProvider, $httpProvider) {
    restmodProvider.rebase('AMSApi');
    $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    restmodProvider.rebase('DefaultPacker');
}]);

var homeController = require('./admin/angular/homecontroller');
var bioController = require('./admin/angular/biocontroller');


var messageService = require('./admin/angular/services/messageservice');
var userService = require('./admin/angular/services/userservice');
var userContentTypeService = require('./admin/angular/services/usercontenttypeservice');
var profileService = require('./admin/angular/services/profileservice');
var bioService = require('./admin/angular/services/biographyservice');
var thePacker = require('./admin/angular/services/thepacker');

var alertDirective = require('./admin/angular/directives/alertdirective');
var closeContentDirective = require('./admin/angular/directives/closecontentdirective');
var contentSelectorDirective = require('./admin/angular/directives/contentselector');

prfXyzApp.factory('Messages',[stc_messages]);
prfXyzApp.factory('MessageService',['Messages','$timeout',messageService]);
prfXyzApp.factory('UserService',['restmod',userService]);
prfXyzApp.factory('ProfileService',['restmod',profileService]);
prfXyzApp.factory('UserContentType',['restmod',userContentTypeService]);
prfXyzApp.factory('BiographyService',['restmod',bioService]);
prfXyzApp.factory('ThePacker',[thePacker]);

prfXyzApp.directive('alert',[alertDirective]);
prfXyzApp.directive('closeContent',[closeContentDirective]);
prfXyzApp.directive('contentSelector',['MessageService','UserContentType',contentSelectorDirective]);

prfXyzApp.controller('HomeCtrl',['$scope','UserService','UserContentType',homeController]);
prfXyzApp.controller('BioCtrl',['$scope','BiographyService','MessageService',bioController]);

