<?php
include_once "php/headSection.php";
?>
<body ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">
<?php
include_once "php/navBar.php";
?>

<div ng-init="Schedule.db"></div>

<div ng-app="getApp">

	var getApp = angular.module("getApp", []);
	getApp.factory('', function(grab_content)){
	}
	
	myApp.controller('ShowFirstName', ['$firstname, grab_first($firstname) {
		  $check_name = function grab_content("firstname"){
			            this.firstname = search.firstname;
	
	                           return this.firstname;
		            	};
		            	
		            	
	myApp.controller('ShowLastName', ['$lastname, grab_first($lastname) {
		  $check_name = function grab_content("lastname"){
			            this.lastname = search.lastname;
	
	                           return this.lastname;
		            	};

	<label>Find the employee desired:
	<div ng-controller="ShowFirstName">
		First Name <input class="form-control" type="text" ng-model="search.firstname"></br>
		{{search.firstname}};
	</div>
	
	
	<div ng-controller="ShowLastName">
	    Last Name <input class="form-control" type="text" ng-model="search.lastname"></br>
		{{search.lastname}};
	</div>
	</label>
	
	$filter('firstname')(array, $:enterfirstname, false);
	
	<div ng-repeat="i in Schedule | filter:simpleSearch" style="margin-top:50px;">
		{{i.firstname}};
		{{i.lastname}};
	</div>
	
	grab_first(search.firstname);
	grab_last(search.lastname);
	
	<p>The first name is {{EMPLOYEE_FNAME}}</p>
	<p>The last name is {{EMPLOYEE_LNAME}}</p>

</div>
