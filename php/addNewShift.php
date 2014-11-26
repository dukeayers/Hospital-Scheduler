<?php
include 'SessionLogin.php';

#$sql = ("INSERT INTO shift (SHIFT_ID, Start_time, end_time) VALUES ('".$_POST['shiftID']."', '".$_POST['shiftBegin']."', '".$_POST['shiftClose']."')");
#$result = $mysqli->query($sql) or die($mysqli->error);


#echo json_encode($result);

#Prepared Statement
$sql = ("INSERT INTO shift (Start_Time, End_Time) VALUES (?, ?)");
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $_POST['shiftBegin'], $_POST['shiftClose']);
$result = $stmt->execute();

echo json_encode($result);