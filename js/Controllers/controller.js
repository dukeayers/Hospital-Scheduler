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
calendarApp.controller("controller",['$scope', '$http', function($scope, $http) {
    $scope.requestData = [];
    $scope.showData = '';
    $scope.testData = [];
    $scope.formData = {};
    $scope.addShift = {};

    //TODO: Uncomment the line below once you are ready to check the data coming back from the AJAX request.
    // This works like a normal function call.
    //$scope.getShifts();


    //Makes the call to get the data from the DB
    $scope.getCalendarData = function () {
        $http.get('php/getInfo.php')
            .success(function (data) {

                angular.forEach(data, function (value, key) {
                    console.log(data);
                    //Split the shift/day JSON data into a list with the javascript split function
                    value.Day = (value.Day).split(",");
                    value.Shift = (value.Shift).split(",");
                    $scope.testData[0] = '';
                    $scope.testData[1] = '';
                    $scope.testData[2] = '';
                    $scope.testData[3] = '';
                    $scope.testData[4] = '';
                    $scope.testData[5] = '';
                    $scope.testData[6] = '';

                    //Check if we have shifts on any of those days
                    //Really, we could do this multiple ways but I chose to check the Day and then change the shift.
                    if (value.Day.length === 1) {
                        if (value.Day[0] === "Monday") {
                            $scope.testData[0] = value.Shift[0];
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';

                        }
                        else if (value.Day[0] === "Tuesday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = value.Shift[0];
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if (value.Day[0] === "Wednesday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = value.Shift[0];
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if (value.Day[0] === "Thursday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = value.Shift[0];
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if (value.Day[0] === "Friday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = value.Shift[0];
                            $scope.testData[5] = '';
                            $scope.testData[6] = '';
                        }
                        else if (value.Day[0] === "Saturday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = value.Shift[0];
                            $scope.testData[6] = '';
                        }
                        else if (value.Day[0] === "Sunday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = '';
                            $scope.testData[6] = value.Shift[0];
                        }
                    }

                    //Check with two values in the array
                    else if (value.Day.length == 2) {
                        if (value.Day[0] === "Monday") {
                            $scope.testData[0] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Tuesday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Wednesday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Thursday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Friday") {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = value.Shift[0];
                        }
                        else {
                            $scope.testData[0] = '';
                            $scope.testData[1] = '';
                            $scope.testData[2] = '';
                            $scope.testData[3] = '';
                            $scope.testData[4] = '';
                            $scope.testData[5] = value.Shift[0];
                        }
                        //Check the second value
                        if (value.Day[1] === "Tuesday") {
                            $scope.testData[1] = value.Shift[1];
                        }
                        else if (value.Day[1] === 'Wednesday') {
                            if (value.Day[0] === "Monday") {
                                $scope.testData[1] = '';
                                $scope.testData[2] = value.Shift[1];
                                $scope.testData[3] = '';
                                $scope.testData[4] = '';
                                $scope.testData[5] = '';
                                $scope.testData[6] = '';
                            }
                            else {
                                $scope.testData[2] = value.Shift[1];
                                $scope.testData[3] = '';
                                $scope.testData[4] = '';
                                $scope.testData[5] = '';
                                $scope.testData[6] = '';
                            }
                        }
                        else if (value.Day[1] === 'Thursday') {
                            if (value.Day[0] === "Monday") {
                                $scope.testData[1] = '';
                                $scope.testData[2] = '';
                                $scope.testData[3] = value.Shift[1];
                                $scope.testData[4] = '';
                                $scope.testData[5] = '';
                                $scope.testData[6] = '';
                            }
                            else {
                                $scope.testData[3] = value.Shift[1];
                                $scope.testData[4] = '';
                                $scope.testData[5] = '';
                                $scope.testData[6] = '';
                            }
                        }
                        else if (value.Day[1] === 'Friday') {
                            if (value.Day[0] === "Monday") {
                                $scope.testData[1] = '';
                                $scope.testData[2] = '';
                                $scope.testData[3] = '';
                                $scope.testData[4] = value.Shift[1];
                                $scope.testData[5] = '';
                                $scope.testData[6] = '';
                            }
                            else {
                                $scope.testData[4] = value.Shift[1];
                                $scope.testData[5] = '';
                                $scope.testData[6] = '';
                            }
                        }
                        else if (value.Day[1] === 'Saturday') {
                            if (value.Day[0] === "Monday") {
                                $scope.testData[1] = '';
                                $scope.testData[2] = '';
                                $scope.testData[3] = '';
                                $scope.testData[4] = '';
                                $scope.testData[5] = value.Shift[1];
                                $scope.testData[6] = '';

                            }
                            else {
                                $scope.testData[5] = value.Shift[1];
                                $scope.testData[6] = '';

                            }
                        }
                        else if (value.Day[1] === 'Sunday') {
                            if (value.Day[0] === "Monday") {
                                $scope.testData[1] = '';
                                $scope.testData[2] = '';
                                $scope.testData[3] = '';
                                $scope.testData[4] = '';
                                $scope.testData[5] = '';
                                $scope.testData[6] = value.Shift[1];
                            }
                            else {
                                $scope.testData[6] = value.Shift[1];
                            }
                        }

                    }
                    else if (value.Day.length == 3) {
                        // console.log(value.Name);
                        if (value.Day[0] === "Monday") {
                            $scope.testData[0] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Tuesday") {
                            $scope.testData[1] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Wednesday") {
                            $scope.testData[2] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Thursday") {
                            $scope.testData[3] = value.Shift[0];
                        }
                        else {
                            $scope.testData[4] = value.Shift[0];
                        }
                        //Check the second value
                        if (value.Day[1] === "Tuesday") {
                            $scope.testData[1] = value.Shift[1];
                        }
                        else if (value.Day[1] === 'Wednesday') {
                            $scope.testData[2] = value.Shift[1];
                        }
                        else if (value.Day[1] === 'Thursday') {
                            $scope.testData[3] = value.Shift[1];
                        }
                        else if (value.Day[1] === 'Friday') {
                            console.log('Friday: ' + value.Name);
                            console.log($scope.testData);
                            $scope.testData[4] = value.Shift[1];
                        }
                        else {
                            $scope.testData[5] = value.Shift[1];
                        }
                        //Check the third value
                        if (value.Day[2] === "Wednesday") {
                            $scope.testData[2] = value.Shift[2];
                        }
                        else if (value.Day[2] === 'Thursday') {
                            $scope.testData[3] = value.Shift[2];
                        }
                        else if (value.Day[2] === 'Friday') {
                            $scope.testData[4] = value.Shift[2];
                        }
                        else if (value.Day[2] === 'Saturday') {
                            $scope.testData[5] = value.Shift[2];
                        }
                        else {

                            $scope.testData[6] = value.Shift[2];

                        }
                    }
                    else if (value.Day.length == 4) {
                        if (value.Day[0] === "Monday") {
                            $scope.testData[0] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Tuesday") {
                            $scope.testData[1] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Wednesday") {
                            $scope.testData[2] = value.Shift[0];
                        }
                        else {
                            $scope.testData[3] = value.Shift[0];
                        }
                        //Check the second value
                        if (value.Day[1] === "Tuesday") {
                            $scope.testData[1] = value.Shift[1];
                        }
                        else if (value.Day[1] === 'Wednesday') {
                            $scope.testData[2] = value.Shift[1];
                        }
                        else if (value.Day[1] === 'Thursday') {
                            $scope.testData[3] = value.Shift[1];
                        }
                        else {
                            $scope.testData[4] = value.Shift[1];
                        }
                        //Check the third value
                        if (value.Day[2] === "Wednesday") {
                            $scope.testData[2] = value.Shift[2];
                        }
                        else if (value.Day[2] === 'Thursday') {
                            $scope.testData[3] = value.Shift[2];
                        }
                        else if (value.Day[2] === 'Friday') {
                            $scope.testData[4] = value.Shift[2];
                        }
                        else {
                            $scope.testData[5] = value.Shift[2];
                        }
                        //Check Fourth Value

                        if (value.Day[3] === 'Thursday') {
                            $scope.testData[3] = value.Shift[3];
                        }
                        else if (value.Day[3] === 'Friday') {
                            $scope.testData[4] = value.Shift[3];
                        }
                        else if (value.Day[3] === 'Saturday') {
                            $scope.testData[5] = value.Shift[3];
                        }
                        else {
                            $scope.testData[6] = value.Shift[3];

                        }
                    }
                    else if (value.Day.length == 5) {
                        if (value.Day[0] === "Monday") {
                            console.log('here');
                            $scope.testData[0] = value.Shift[0];
                        }
                        else if (value.Day[0] === "Tuesday") {
                            $scope.testData[1] = value.Shift[0];
                        }
                        else {
                            $scope.testData[2] = value.Shift[0];
                        }
                        //Check the second value
                        if (value.Day[1] === "Tuesday") {
                            $scope.testData[1] = value.Shift[1];
                        }
                        else if (value.Day[1] === 'Wednesday') {
                            $scope.testData[2] = value.Shift[1];
                        }
                        else {
                            $scope.testData[3] = value.Shift[1];
                        }
                        //Check the third value
                        if (value.Day[2] === "Wednesday") {
                            $scope.testData[2] = value.Shift[2];
                        }
                        else if (value.Day[2] === 'Thursday') {
                            $scope.testData[3] = value.Shift[2];
                        }
                        else {
                            $scope.testData[4] = value.Shift[2];
                        }
                        //Check Fourth Value

                        if (value.Day[3] === 'Thursday') {
                            $scope.testData[3] = value.Shift[3];
                        }
                        else if (value.Day[3] === 'Friday') {
                            $scope.testData[4] = value.Shift[3];
                        }
                        else {
                            $scope.testData[5] = value.Shift[3];
                        }
                        //Check Fifth Value
                        if (value.Day[4] === 'Friday') {
                            $scope.testData[4] = value.Shift[4];
                        }
                        else if (value.Day[4] === 'Saturday') {
                            $scope.testData[5] = value.Shift[4];
                        }
                        else {
                            $scope.testData[6] = value.Shift[4];
                        }
                    }
                    else if (value.Day.length == 6) {
                        if (value.Day[0] === "Monday") {
                            console.log('here');
                            $scope.testData[0] = value.Shift[0];
                        }
                        else {
                            $scope.testData[1] = value.Shift[0];
                        }
                        //Check the second value
                        if (value.Day[1] === "Tuesday") {
                            $scope.testData[1] = value.Shift[1];
                        }
                        else {
                            $scope.testData[2] = value.Shift[1];
                        }
                        //Check the third value
                        if (value.Day[2] === "Wednesday") {
                            $scope.testData[2] = value.Shift[2];
                        }
                        else {
                            $scope.testData[3] = value.Shift[2];
                        }
                        //Check Fourth Value

                        if (value.Day[3] === 'Thursday') {
                            $scope.testData[3] = value.Shift[3];
                        }
                        else {
                            $scope.testData[4] = value.Shift[3];
                        }
                        //Check Fifth Value
                        if (value.Day[4] === 'Friday') {
                            $scope.testData[4] = value.Shift[4];
                        }
                        else {
                            $scope.testData[5] = value.Shift[4];
                        }
                        //Check Sixth Value
                        if (value.Day[5] === 'Saturday') {
                            $scope.testData[5] = value.Shift[4];
                        }
                        else {
                            $scope.testData[6] = value.Shift[4];
                        }
                    }
                    else {
                        $scope.testData[0] = value.Shift[0];
                        $scope.testData[1] = value.Shift[1];
                        $scope.testData[2] = value.Shift[2];
                        $scope.testData[3] = value.Shift[3];
                        $scope.testData[4] = value.Shift[4];
                        $scope.testData[5] = value.Shift[5];
                        $scope.testData[6] = value.Shift[6];
                    }
                    //Adjusts the Shift array to our new data that we just made.
                    value.Shift[0] = $scope.testData[0];
                    value.Shift[1] = $scope.testData[1];
                    value.Shift[2] = $scope.testData[2];
                    value.Shift[3] = $scope.testData[3];
                    value.Shift[4] = $scope.testData[4];
                    value.Shift[5] = $scope.testData[5];
                    value.Shift[6] = $scope.testData[6];


                    //Send the data to the front side.
                    $scope.requestData.push(value);

                });
            })
            .error(function (data) {
            });
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
