<?php
include 'SessionLogin.php';

#unsafe
#$sql = ("INSERT INTO employee (First_Name, Last_Name) VALUES ('".$_POST['employeeFirstName']."', '".$_POST['employeeLastName']."')");
#$result = $mysqli->query($sql) or die($mysqli->error);

#escaped
#$sql = ("INSERT INTO employee (First_Name, Last_Name) VALUES ('".$mysqli->real_escape_string($_POST['employeeFirstName'])."', '".$mysqli->real_escape_string($_POST['employeeLastName'])."')");
#$result = $mysqli->query($sql) or die($mysqli->error);

#prepared statements
$sql = ("INSERT INTO employee (UID, First_Name, Last_Name, User_Type) VALUES (?, ?, ?, ?)");
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss", $_POST['employeeUID'], $_POST['employeeFirstName'], $_POST['employeeLastName'], $_POST['employeeType']);
$result = $stmt->execute();

echo json_encode($result);