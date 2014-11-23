<?php
include 'SessionLogin.php';

$sql = ("INSERT INTO shift (SHIFT_ID, Start_time, end_time) VALUES ('".$_POST['shiftID']."', '".$_POST['shiftBegin']."', '".$_POST['shiftClose']."')");
$result = $mysqli->query($sql) or die($mysqli->error);


echo json_encode($result);