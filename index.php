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

<?php
include_once "php/footer.php";
?>
    </body>