'use strict'
var $ = require('jquery');
//var pusherf = require('../components/pusher/dist/pusher-index.js');

var angular = require('./../vendor/angular/angular-index.js');
var angular_restmod = require('./../vendor/angular-restmod/dist/angular-restmod-bundle.js');
var res_style = require('./../vendor/angular-restmod/dist/styles/ams.min.js');



var testApp = angular.module('testApp',['restmod']);


testApp.config(function(restmodProvider) {
    restmodProvider.rebase('AMSApi');
    restmodProvider.rebase('DefaultPacker');
});

var homeController = require('./admin/angular/homecontroller');

var userService = require('./admin/angular/services/userservice');

var alertDirective = require('./admin/angular/directives/alertdirective');
var closeContentDirective = require('./admin/angular/directives/closecontentdirective');

testApp.factory('UserService',['restmod',userService]);

testApp.directive('alert',[alertDirective]);
testApp.directive('closeContent',[closeContentDirective]);

testApp.controller('HomeCtrl',['$scope','UserService',homeController]);

