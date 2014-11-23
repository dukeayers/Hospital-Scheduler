<?php
include 'SessionLogin.php';

/*TODO: Input the MySQL query to pull all of the shift data. The code below should take care of the rest for you. */
$sql = ("SELECT DISTINCT
SHIFT_ID as ID,
SHIFT_START as Start,
SHIFT_END as End
FROM shift;");

$result = $mysqli->query($sql) or die($mysqli->error);
$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}
echo json_encode($array_result);
