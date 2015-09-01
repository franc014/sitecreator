var experienceDirective = function(MessageService,Experience,$timeout,Helper){
    return {
        templateUrl:"../../js/admin/angular/templates/resume/experience.html",
        restrict:"EA",
        scope:{},

        controller:function($scope,$rootScope){
            $scope.closeForm = function(){
                Helper.enableForm($scope,false);
            };
            Helper.enableForm($scope,false);


            $rootScope.$on('resumeChange',function(event,args){

                /*$scope.sortingLog = [];
                var tmpList = [];
                $scope.sortableOrder = [];
                for (var i = 1; i <= 6; i++){
                    tmpList.push({
                        text: 'Item ' + i,
                        value: i
                    });
                }
                $scope.sortableOptions = {
                    activate: function() {
                        console.log("activate");
                    },
                    beforeStop: function() {
                        console.log("beforeStop");
                    },
                    change: function() {
                        console.log("change");
                    },
                    create: function() {
                        console.log("create");
                    },
                    deactivate: function() {
                        console.log("deactivate");
                    },
                    out: function() {
                        console.log("out");
                    },
                    over: function() {
                        console.log("over");
                    },
                    receive: function() {
                        console.log("receive");
                    },
                    remove: function() {
                        console.log("remove");
                    },
                    sort: function() {
                        console.log("sort");
                    },
                    start: function() {
                        console.log("start");
                    },
                    update: function(e, ui) {
                        $scope.$apply();
                        console.log(this);

                        var logEntry = tmpList.map(function(i){
                            return i.value;
                        }).join(', ');
                        $scope.sortingLog.push('Update: ' + logEntry);
                        console.log($scope.sortingLog);
                    },
                    stop: function(e, ui) {

                        var $list=ui.item.parent();
                        console.log($list);
                        $scope.sortableOrder = $list.sortable('toArray');
                        console.log($scope.sortableOrder);
                        // this callback has the changed model
                        var logEntry = tmpList.map(function(i){
                            return i.value;
                        }).join(', ');
                        $scope.sortingLog.push('Stop: ' + logEntry);
                        console.log($scope.sortingLog);
                    }
                };*/
                /*var exp = [];
                exp  = $scope.experiences;
                $scope.bar = function($item, $partFrom, $partTo, $indexFrom, $indexTo){
                    console.log($scope.experiences);
                    console.log($indexFrom);
                    console.log($indexTo);
                    console.log($partFrom);
                    console.log($partTo);
                };

                $scope.baz = function($item, $part, $index){
                    console.log($item);
                    console.log($part);
                    console.log($index);

                };*/


                if(typeof args.resume !== "undefined") {
                    var resumeId = args.resume.id;
                    var experiences = Experience.$search({resume_id: resumeId}).$then(function (data) {
                        $scope.experiences = data;
                        if ($scope.experiences.length == 0) {
                            MessageService.setNoItemsInfoMessage($scope, " experiencias",
                                ". Pulsa el botón Nueva para crear una");
                        }

                    });
                    //new
                    $scope.newExperience = function () {
                        console.log('aqio');
                        Helper.enableForm($scope, true);
                        var experience = Experience.$build({resume_id: resumeId, initdate: '', enddate: ''});
                        $scope.experience = experience;
                        $scope.monthoptions = Helper.months();
                        $scope.experience.initmonth = Helper.months()[0];
                        $scope.experience.endmonth = Helper.months()[0];

                        $scope.updateExperience = function () {
                            var isCurrent = $scope.experience.currentplace;
                            $scope.experience.current = 0;
                            if (isCurrent) {
                                $scope.experience.current = 1;
                            }
                            $scope.experience.initdate = $scope.experience.initmonth + "-" + $scope.experience.inityear;
                            $scope.experience.enddate = $scope.experience.endmonth + "-" + $scope.experience.endyear;

                            experience.$save().$then(function (data) {
                                $scope.experiences.$refresh();
                                $scope.experienceForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }

                    };
                    //edit
                    $scope.editExperience = function (experience) {
                        Helper.enableForm($scope, true);
                        $scope.monthoptions = Helper.months();
                        var imonthIndex = Helper.months().indexOf(experience.imonth);
                        var emonthIndex = Helper.months().indexOf(experience.emonth);
                        $scope.experience = experience;
                        $scope.experience.initmonth = $scope.monthoptions[imonthIndex];
                        $scope.experience.endmonth = $scope.monthoptions[emonthIndex];
                        $scope.experience.inityear = experience.iyear;
                        $scope.experience.endyear = experience.eyear;


                        $scope.updateExperience = function () {
                            var isCurrent = $scope.experience.currentplace;
                            $scope.experience.current = 0;
                            if (isCurrent) {
                                $scope.experience.current = 1;
                            }
                            $scope.experience.initdate = $scope.experience.initmonth + "-" + $scope.experience.inityear;
                            $scope.experience.enddate = $scope.experience.endmonth + "-" + $scope.experience.endyear;

                            experience.$save().$then(function (data) {
                                $scope.experiences.$refresh();
                                $scope.experienceForm.$resetForm();
                                Helper.enableForm($scope, false);
                                var meta = data.$metadata.meta;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //delete
                    $scope.removeExperience = function (experience) {
                        $scope.experience = experience;
                        var confirmation = MessageService.setConfirmDeleteMessage(" experiencia", " ");
                        if (confirmation) {
                            experience.$destroy().$then(function (data) {
                                var meta = data.$response.data;
                                MessageService.setAlertMessage($scope, meta);
                            });
                        }
                    };

                    //change status
                    $scope.changeStatus = function ($event, experience) {
                        /*console.log(experience);*/
                        var checkbox = $event.target;
                        var action = (checkbox.checked ? true : false);

                        experience.status = action;
                        experience.$save().$then(function (data) {
                            $scope.experiences.$refresh();
                            var meta = data.$metadata.meta;
                            MessageService.setAlertMessage($scope, meta);
                        });
                    };

                }
            });

        }
    }

};
module.exports = experienceDirective;
