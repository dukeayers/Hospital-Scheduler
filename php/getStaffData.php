<?php
include 'SessionLogin.php';

$sql = ("SELECT DISTINCT
Employee_ID as ID,
UID as uid,
First_Name as fname,
Last_Name as lname,
User_Type as usertype
FROM employee;");

$result = $mysqli->query($sql) or die($mysqli->error);
$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}
echo json_encode($array_result);
