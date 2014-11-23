<?php
include 'SessionLogin.php';


/*TODO: Add in PHP statement to update the database with the shift. */
$sql = ("UPDATE shift SET  SHIFT_START = '".$_POST['shiftStart']."', SHIFT_END = '".$_POST['shiftEnd']."' WHERE SHIFT_ID ='".$_POST['shiftID']."';");

$result = $mysqli->query($sql) or die($mysqli->error);
echo json_encode($result);
