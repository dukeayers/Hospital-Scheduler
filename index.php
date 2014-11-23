<?php
/* Hiding Login checking till it is need.
 * session_start(); //Begin session, used for login verification
 * //Checks for logged in status, redirects to login page if the user is not logged in.
 * if (!(isset($_SESSION["logged_in"]))) {
 * header('Location: login.php');
 * exit();
 * }
 */?>
<?php
include_once "php/headSection.php";
?>
<style>
    .sidebar{
        height:100%;
        background:#60D1A1;
        position:fixed;
        margin-top:-21px;
    }
    .nav .nav-pills .nav-stacked li a:hover{

        background:black !important;
    }
    .sidebar-nav a:hover{
        border-radius:0 !important;
        background:#059658 !important;
        padding-top:5px;
    }
    .active1{
        border-radius:0 !important;
        background:#059658 !important;

    }
    .active1 a:hover{
        border-radius:0 !important;
        background:#059658 !important;

    }

</style>
    <body  ng-app="calendarApp" ng-controller="controller" ng-init="findMonday()" style="background:#d3d3d3;">
<?php
include_once "php/navBar.php";
?>

<div class="sidebar col-xs-2" style="padding: 0 !important;">
    <ul class="nav nav-pills nav-stacked text-center" style="width:100%; border-radius:0 !important; ">
        <li class="active1"><a style="color:white; font-weight:800; font-size:18px;" href="#">Dashboard</a></li>
        <li class="sidebar-nav"><a style="color:white; font-weight:800; font-size:18px;" href="calendarView.php">My Calendar</a></li>
        <li class="sidebar-nav"><a style="color:white; font-weight:800; font-size:18px;" href="shiftView.php">Shifts</a></li>
        <li class="sidebar-nav"><a style="color:white; font-weight:800; font-size:18px;" href="">My Information</a></li>
    </ul>
<!--    <div class="btn-group-vertical col-xs-12" role="group">-->
<!--        <button class="btn btn-primary " style="margin-top:21px;">Dashboard</button>-->
<!--        <button class="btn btn-primary " >Calendar</button>-->
<!--        <button class="btn btn-primary " >Manage Shifts</button>-->
<!--        <button class="btn btn-primary " >My Information</button>-->
<!--    </div>-->
</div>

<div class="col-xs-10 col-xs-push-2" style="background:white; border-radius: 5px; margin-left:25px; width:80.33%;">
    <div class="row text-center">
        <h3 style="border-bottom:1px solid lightgray">Weekly Calendar</h3>
    </div>

    <div class="table-responsive" style="margin-top:10px;">

        <table class="table text-center">
            <div class="spinner">
                <span us-spinner="{radius:30, width:8, length: 16}"></span>
            </div>
            <thead class="calendarHead text-center" >
            <td>Name</td>
            <td ng-repeat="calendar in tableHeader">{{calendar | date: 'EEE'}}</br>{{calendar | date:'MM-dd-yyyy'}}</td>
            </thead>
            <tbody>
            <tr ng-repeat="data in requestData">
                <td>{{data.first_name}}</td>
                <td ng-repeat="shifts in data.shift track by $index">
                    {{shifts}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <nav>
        <ul class="pager">
            <li><a href="#" ng-click="previousWeek()">Previous</a></li>
            <li><a href="#" ng-click="nextWeek()">Next</a></li>
        </ul>
    </nav>
</div>

<?php
include_once "php/footer.php";
?>
    </body>