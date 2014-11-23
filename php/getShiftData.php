<?php
include 'SessionLogin.php';

$sql = ("SELECT DISTINCT
SHIFT_ID as ID,
Start_time as Start,
End_time as End
FROM shift;");

$result = $mysqli->query($sql) or die($mysqli->error);
$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}
echo json_encode($array_result);
