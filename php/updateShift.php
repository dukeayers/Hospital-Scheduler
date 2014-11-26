<?php
include 'SessionLogin.php';

#Prepared Statement
$sql = ("UPDATE shift SET  Start_time= (?), end_time = (?) WHERE SHIFT_ID =(?);");
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssi", $_POST['shiftStart'], $_POST['shiftEnd'], $_POST['shiftID']);
$result = $stmt->execute();

echo json_encode($result);
