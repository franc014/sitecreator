'use strict'
var $ = require('jquery');
//var pusherf = require('../components/pusher/dist/pusher-index.js');

var angular = require('./vendor/angular/angular-index.js');
var angular_restmod = require('./vendor/angular-restmod/dist/angular-index.js');

var testApp = angular.module('testApp',[]);

var homeController = require('./admin/angular/homecontroller');

var userService = require('./admin/angular/services/userservice');

var alertDirective = require('./admin/angular/directives/alertdirective');
var closeContentDirective = require('./admin/angular/directives/closecontentdirective');

testApp.factory('UserService',[userService]);

testApp.directive('alert',[alertDirective]);
testApp.directive('closeContent',[closeContentDirective]);

testApp.controller('HomeCtrl',['$scope',homeController]);

