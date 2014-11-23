<?php
include 'SessionLogin.php';

$sql = ("UPDATE shift SET  Start_time= '".$_POST['shiftStart']."', end_time = '".$_POST['shiftEnd']."' WHERE SHIFT_ID ='".$_POST['shiftID']."';");

$result = $mysqli->query($sql) or die($mysqli->error);
echo json_encode($result);
