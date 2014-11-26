<?php
include 'SessionLogin.php';

#Prepared Statement
$sql = ("UPDATE employee SET  UID= (?), First_Name= (?), Last_Name = (?), User_Type = (?) WHERE Employee_ID =(?);");
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssii", $_POST['uid'], $_POST['fname'], $_POST['lname'], $_POST['usertype'], $_POST['ID']);
$result = $stmt->execute();

echo json_encode($result);
