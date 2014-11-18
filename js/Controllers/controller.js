var calendarApp = angular.module('calendarApp', ['ngRoute', 'ngMessages', 'ngAnimate']);
/*calendarApp.config(function ($routeProvider) {
    $routeProvider
        .when('/',
        {
            templateUrl: "js/Template/insertEvent.html",
            controller: "sampleCtrl"
        }
    )
})*/
//


calendarApp.controller("controller",['$scope', '$http', '$filter', function($scope, $http, $filter) {
    $scope.requestData = [];
    $scope.showData = '';
    $scope.testData = [];
    $scope.formData = {};
    $scope.addShift = {};
    $scope.tableHeader = [];
    $scope.dateData = {};
    $scope.oneDay = 24*60*60*1000;


function generateHeader (startDay,endDay){
    $scope.tableHeader = [];
    $scope.tableHeader.push(new Date(startDay * 1000));
    startDay = startDay * 1000;
    var oneDay = 24*60*60*1000;
    while($scope.tableHeader.length < 7){
        startDay += oneDay;
        $scope.tableHeader.push(new Date(startDay));
    }
    console.log($scope.tableHeader);
}

$scope.findMonday = function(){
    $scope.todayDate = $filter('date')(new Date(), "EEE");
    console.log($scope.todayDate);
    var oneDay = 24*60*60*1000;
    var sixDays = oneDay * 6;
    if($scope.todayDate != 'Mon'){
        $scope.testDate = new Date();
        $scope.testDate = Date.parse($scope.testDate);
        while($scope.todayDate != 'Mon'){
            $scope.testDate -= oneDay;
            $scope.todayDate = $filter('date')(new Date($scope.testDate), "EEE");
        }

        $scope.sevenDay = $scope.testDate + sixDays;
        $scope.getCalendarData($scope.testDate/1000, $scope.sevenDay/1000);
    }
    else{
        $scope.testDate = new Date();
        $scope.testDate = Date.parse($scope.testDate);
        $scope.sevenDay = $scope.testDate + sixDays;
        $scope.getCalendarData($scope.testDate/1000, $scope.sevenDay/1000);
        console.log($scope.testDate);
    }
};

    $scope.previousWeek = function(){
        var sevenDays = 24*60*60*1000 * 7;
        $scope.testDate = $scope.testDate - sevenDays;
        $scope.sevenDay =  $scope.sevenDay - sevenDays;
        $scope.getCalendarData($scope.testDate/1000, $scope.sevenDay/1000);
    };
    $scope.nextWeek = function(){
        var sevenDays = 24*60*60*1000 * 7;
        $scope.testDate = $scope.testDate + sevenDays;
        $scope.sevenDay =  $scope.sevenDay + sevenDays;
        $scope.getCalendarData($scope.testDate, $scope.sevenDay);
    };





    $scope.getCalendarData = function(startDay, endDay){
    generateHeader(startDay, endDay);
    $scope.dateData.startDate = $filter('date')(new Date(startDay * 1000), "yyyy-MM-dd");
    $scope.dateData.endDate= $filter('date')(new Date(endDay * 1000), "yyyy-MM-dd");
    $http({
        method: "POST",
        url: "php/getInfo.php",
        data: $.param($scope.dateData),
        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    })
        .success(function(data){
            $scope.requestData = [];
            angular.forEach(data, function(val){
                //Create new arrays to hold the data in.
                $scope.newDates = [];
                $scope.newShifts = [];
                //Split the data from the string they are in.
                val.date = (val.date).split(",");
                val.shift = (val.shift).split(",");
                //Set up variables to check the start day and end day
                //Also set a variable to account for one entire day.


                //console.log(startDay);
                var endDay1 = endDay;
                for(var i = 0; i < val.date.length; i ++){
                    var startDay1 = startDay;
                    var difference = 0;
                    var oneDay = 24*60*60;
                    //console.log(val.date[i]);
                    //var newDate = new Date(val.date[i]);
                    //newDate.setMinutes(newDate.getMinutes() + newDate.getTimezoneOffset());
                    //console.log(newDate);
                    var setDate = new Date(val.date[i]);
                    setDate.setMinutes(setDate.getMinutes() + setDate.getTimezoneOffset());
                    var currentDate = setDate.getTime()/1000;
                    var setDate1 = new Date(val.date[i + 1]);
                    setDate1.setMinutes(setDate1.getMinutes() + setDate1.getTimezoneOffset());
                    var nextShift = setDate1.getTime()/1000;

                    //console.log("Current Date: " + setDate);
                    //console.log("Start Date: " + startDay1);

                    if(val.date.length == 1){
                        var startDiff = Math.ceil((currentDate - startDay1)/oneDay);
                       // console.log("Start Difference: " + startDiff);
                        if(startDiff > 1){
                            var newDate = new Date(startDay1 * 1000);
                            $scope.newDates.push(newDate);
                            $scope.newShifts.push('');
                            while(startDiff > 1){
                                startDay1 += oneDay;
                                newDate = new Date(startDay1 * 1000);
                                $scope.newDates.push(newDate);
                                $scope.newShifts.push('');
                                startDiff -= 1;
                            }
                            newDate = new Date(currentDate * 1000);
                            $scope.newDates.push(newDate);
                            $scope.newShifts.push(val.shift[i]);
                        }
                        else if(startDiff == 1){
                            $scope.newDates.push(new Date(startDay1 * 1000));
                            $scope.newShifts.push('');
                            $scope.newDates.push(new Date(currentDate * 1000));
                            $scope.newShifts.push(val.shift[i]);
                        }
                        else{
                            $scope.newDates.push(new Date(currentDate * 1000));
                            $scope.newShifts.push(val.shift[i]);
                        }

                        var endDiff = Math.floor((endDay1 - currentDate)/oneDay);
                       // console.log(endDiff);
                        if(endDiff > 1){
                           // console.log(val.first_name);
                            while(endDiff > 1){
                                currentDate += oneDay;
                                $scope.newDates.push(new Date(currentDate * 1000));
                                $scope.newShifts.push('');
                                endDiff --;
                            }
                            $scope.newDates.push(new Date(endDay1 * 1000));
                            $scope.newShifts.push('');
                        }
                        else if(endDiff == 1){
                            $scope.newDates.push(new Date(endDay1 * 1000));
                            $scope.newShifts.push('');
                        }
                        else{
                            break;
                        }

                    }
                    else{
                        if(i == 0){
                            //console.log(new Date(currentDate * 1000));
                            startDiff = Math.ceil((currentDate - startDay1) / oneDay);
                            //console.log(val.first_name + ' ' + startDiff);
                           // console.log(new Date(startDay1 * 1000));
                            if(startDiff > 1){
                                newDate = new Date(startDay1 * 1000);
                                $scope.newDates.push(newDate);
                                $scope.newShifts.push('');
                                console.log(newDate);
                                while( startDiff > 1){
                                    startDay1 += oneDay;
                                    newDate = new Date(startDay1 * 1000);
                                    $scope.newDates.push(newDate);
                                    $scope.newShifts.push('');
                                    startDiff -= 1;
                                }
                                $scope.newDates.push(new Date(currentDate * 1000));
                                $scope.newShifts.push(val.shift[i]);
                            }
                            else if(startDiff == 1){
                                newDate = new Date(startDay1 * 1000);
                                $scope.newDates.push(newDate);
                                $scope.newShifts.push('');
                                $scope.newDates.push(new Date(currentDate * 1000));
                                $scope.newShifts.push(val.shift[i]);

                            }
                            else{
                                newDate = new Date(currentDate * 1000);
                                $scope.newDates.push(newDate);
                                $scope.newShifts.push(val.shift[i]);
                            }
                           var diff = Math.ceil((nextShift - currentDate)/oneDay);
                            if(diff > 1){
                                while(diff > 1){
                                    currentDate += oneDay;
                                    $scope.newDates.push(new Date(currentDate * 1000));
                                    $scope.newShifts.push('');
                                    diff --;
                                }
                                $scope.newDates.push(new Date(nextShift * 1000));
                                $scope.newShifts.push(val.shift[i + 1]);
                            }
                            else{
                                newDate = new Date(nextShift * 1000);
                                $scope.newDates.push(newDate);
                                $scope.newShifts.push(val.shift[i + 1]);
                            }
                        }
                        else if(i != val.date.length - 1){
                            var nextDiff = ((nextShift - currentDate)/oneDay);
                            if(nextDiff > 1){
                                while(nextDiff > 1){
                                    currentDate += oneDay;
                                    $scope.newDates.push(new Date(currentDate * 1000));
                                    $scope.newShifts.push('');
                                    nextDiff --;
                                }
                                $scope.newDates.push(new Date(nextShift * 1000));
                                $scope.newShifts.push(val.shift[i + 1]);

                            }
                            else{
                                $scope.newDates.push(new Date(nextShift * 1000));
                                $scope.newShifts.push(val.shift[i + 1]);

                            }
                        }
                        else{
                            endDiff = Math.floor((endDay1 - currentDate)/oneDay);
                            if(endDiff > 1){
                                while(endDiff > 1){
                                    currentDate += oneDay;
                                    $scope.newShifts.push('');
                                    $scope.newDates.push(new Date(currentDate * 1000));
                                    endDiff --;
                                }
                                $scope.newShifts.push('');
                                $scope.newDates.push(new Date(endDay1 * 1000));
                            }
                            else if(endDiff == 1){
                                $scope.newShifts.push('');

                                $scope.newDates.push(new Date(endDay1 * 1000));
                            }
                            else{
                                break;
                            }
                        }
                    }

                    //Check if there is only one item in the list.
//                    if(val.date.length === 1){
//                        var startDifference = Math.floor((currentDate - startDay1)/oneDay);
//                        var endDifference =  Math.ceil((endDay1 - currentDate)/oneDay);
//                        //Check if the current date is not the start date.
//                        if(startDifference > 0){
//                            //If not, then we start by pushing the start date with an empty shift.
//                            $scope.newDates.push(new Date(startDay1));
//                            $scope.newShifts.push('');
//                            //We then use a while loop to progressively keep adding empty shifts.
//                            while(startDifference > 1){
//                                startDay1 += $scope.oneDay;
//                                $scope.newDates.push(new Date(startDay1));
//                                $scope.newShifts.push('');
//                                startDifference -= 1;
//                            }
//                            //We end by adding the current date with the associated shift.
//                            $scope.newDates.push(new Date(currentDate));
//                            $scope.newShifts.push(val.shift[i]);
//                        }
//                        //Else, it is the start date and we just add it with the shift to the array.
//                        else{
//                            $scope.newDates.push(new Date(currentDate));
//                            $scope.newShifts.push(val.shift[i]);
//                        }
//                        //Checks to see if the current date is the end date.
//                        if(endDifference > 1){
//                            //if not, we repeat the same process as the start above.
//                            while(endDifference > 1){
//                                currentDate = currentDate + oneDay;
//                                $scope.newDates.push(new Date(currentDate));
//                                $scope.newShifts.push('');
//                                endDifference -= 1;
//                            }
//                        }
//                        //Some differences have been below 0 for some reason?
//                        else if (endDifference <= 0){
//                            break;
//                        }
//                        //else we are a
//                        else{
//                            $scope.newDates.push(new Date(endDay1));
//                            $scope.newShifts.push(val.shift[i]);
//                        }
//                    }
//
//                    //Else there are more than one item.
//                    else {
//                        var check = false;
//                        if (i == 0) {
//                            //Check if the current date is the start day
//                            difference = Math.ceil((currentDate - startDay1) / oneDay);
//
//                           // var holdDate = currentDate;
//                            //If so, then we do things.
//                            if (difference > 1) {
//                                check = true;
//                                //Push the current date onto the list.
//                                $scope.newDates.push(new Date(startDay1));
//                                // console.log(val.first_name + " here " + new Date(startDay1));
//                                $scope.newShifts.push('');
//
//                                while (difference > 1) {
//                                    startDay1 = startDay1 + oneDay;
//                                    $scope.newShifts.push('');
//                                    $scope.newDates.push(new Date(startDay1));
//                                    difference -= 1;
//
//                                }
//                                $scope.newShifts.push(val.shift[i]);
//                                $scope.newDates.push(new Date(currentDate));
//                                //console.log(val.first_name + " here " + new Date(currentDate))
//
//
//                                secondDate = Date.parse(val.date[i + 1]) + oneDay;
//                                // currentDate = holdDate;
//                                difference = Math.ceil((secondDate - currentDate) / oneDay);
//                                if (difference > 1) {
//                                    if (!check) {
//                                        $scope.newDates.push(new Date(currentDate));
//                                        $scope.newShifts.push(val.shift[i]);
//                                    }
//                                    while (difference > 1) {
//
//                                        currentDate += oneDay;
//                                        $scope.newShifts.push('');
//                                        $scope.newDates.push(new Date(currentDate));
//
//                                        difference -= 1;
//                                    }
//                                }
//                            }
//                            else {
//                                var secondDate = Date.parse(val.date[i + 1]) + oneDay;
//                                difference = Math.ceil((secondDate - currentDate) / oneDay);
//
//                                if (difference > 1) {
//                                    $scope.newDates.push(new Date(currentDate));
//                                    $scope.newShifts.push(val.shift[i]);
//                                    while (difference > 1) {
//                                        currentDate += oneDay;
//                                        $scope.newShifts.push('');
//                                        $scope.newDates.push(new Date(currentDate));
//                                        difference -= 1;
//                                    }
//                                }
//                                else {
//                                    $scope.newShifts.push(val.shift[i]);
//                                    $scope.newDates.push(new Date(currentDate));
//                                }
//                            }
//                        }
//                        else if(i == (val.date.length - 1)) {
//                           // currentDate = Date.parse(val.date[i]) + oneDay;
//                            difference = Math.ceil((endDay1 - currentDate) / oneDay);
//                            console.log(val.first_name + " " + difference)
//                            if (difference > 1) {
//                                $scope.newShifts.push(val.shift[i]);
//                                $scope.newDates.push(new Date(currentDate));
//                                while (difference > 1) {
//                                    currentDate = currentDate + oneDay;
//                                    $scope.newShifts.push('');
//                                    $scope.newDates.push(new Date(currentDate));
//                                    difference -= 1;
//                                }
//                                $scope.newShifts.push('');
//                                $scope.newDates.push(new Date(endDay1));
//
//                            }
//                            else if(difference == 1){
//                                $scope.newShifts.push(val.shift[i]);
//                                $scope.newDates.push(new Date(currentDate));
//                                $scope.newShifts.push('');
//                                $scope.newDates.push(new Date(endDay1));
//                            }
//                            else {
//                                $scope.newShifts.push(val.shift[i]);
//                                $scope.newDates.push(new Date(endDay1));
//                            }
//                        }
//                        else {
//                            secondDate = Date.parse(val.date[i + 1]) + oneDay;
//                            difference = Math.ceil((secondDate - currentDate) / oneDay);
//                            console.log(val.first_name + " " + difference + " " + new Date(currentDate));
//                            if (difference > 1) {
//                                $scope.newShifts.push(val.shift[i]);
//                                $scope.newDates.push(new Date(currentDate));
//                                while (difference > 1) {
//                                    currentDate += oneDay;
//                                    $scope.newShifts.push('');
//                                    $scope.newDates.push(new Date(currentDate));
//                                    difference -= 1;
//                                }
//                            }
//                            else {
//                                $scope.newShifts.push(val.shift[i]);
//                                $scope.newDates.push(new Date(currentDate));
//                            }
//                        }
//                    }
                }
                val.shift = $scope.newShifts;
                val.date = $scope.newDates;
                $scope.requestData.push(val);
            });

            console.log($scope.requestData);
        })
        .error(function(data){

        })

};

    $scope.shifts = {};
    $scope.getShifts = function () {
        $http.get('php/getShiftData.php')
            .success(function (data) {
                //Below will show the data being sent back from the php file.
                console.log(data);
                $scope.shifts = (data);

            })
            .error(function (data) {
            });
    };

    $scope.updateShifts = function() {
        console.log('here');
        $http({
            method: "POST",
            url: "php/updateShift.php",
            data: $.param($scope.formData),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            //Below will show the data being sent back from the php file.
            $scope.successMessage = "Update Successful";
            location.reload();

        })
            .error(function (data) {
            });
    }

    $scope.addNewShift = function() {
        $http({
            method: "POST",
            url: "php/addNewShift.php",
            data: $.param($scope.addShift),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            console.log(data);
            //Below will show the data being sent back from the php file.
            $scope.successMessage = "Update Successful";
            location.reload();
        })
            .error(function (data) {
            });
    }

    $scope.getShiftDetails = function(ID, startTime, endTime){
        $scope.formData.shiftID = ID;
        $scope.formData.shiftStart = startTime;
        $scope.formData.shiftEnd = endTime;
    }



    /*
    * Below is the demo data for the demo.php page. You can see that we have done this in two ways.
    * One way is using a JSON object and the other way is using just a plain, normal array.
    * As you can see, angular will handle the data almost the same on the front end.
    * */

    $scope.exampleData = {};
    $scope.exampleData = [
        {
            name: 'Duke'
        },
        {
            name: 'Kyle'
        },
        {
            name: 'Kris'
        },
        {
            name: 'Jarrin'
        },
        {
            name: 'Ryan'
        }
    ]

    $scope.exampleArray = [];
    $scope.exampleArray = ['Duke', 'Kyle', 'Kris', 'Jarrin', 'Ryan'];

}]);
