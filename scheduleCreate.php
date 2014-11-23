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
        .dashboard-well-10{
            background:white;
            border-radius: 5px;
            margin-left:25px;
            width:80.33%;
        }

    </style>
<body  ng-app="calendarApp" ng-controller="controller" ng-init="findMonday()" style="background:#d3d3d3;">
<?php
include_once "php/navBar.php";
?>
<div class="row">
    <div class="col-sm-10 col-sm-push-2 dashboard-well-10" style="background:white;">
        <h3 class="text-center">Create Recurring Schedule</h3>
    </div>
</div>
