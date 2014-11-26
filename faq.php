<?php
$title = 'FAQ';
include '/php/SessionLogin.php';
include_once "php/headSection.php";
include_once "php/sideBar.php";
include_once "php/footer.php";
?>
    <body  ng-app="calendarApp" ng-controller="controller" ng-init="getShifts()">

<?php
include_once "php/navBar.php";
?>


<div class="container">
    <div class="row text-center" style="border-bottom:1px solid black;">
        <h2>Frequently Asked Questions</h2>
    </div>
    <?php
    $sql = ('SELECT * FROM faq');
    $result = $mysqli->query($sql) or die($mysqli->error);

    $array_result = array();
    while($row = $result->fetch_assoc()){
        echo '<h3>'.$row['Title'].'</h3>';
        echo '<p>'.$row['Body'].'</p>';
    }
    ?>
</div>

