<?php
include 'SessionLogin.php';

$sql = ("SELECT DISTINCT
b.EMPLOYEE_FNAME AS Name,
GROUP_CONCAT(a.SCHEDULE_DAY ORDER BY FIELD(a.SCHEDULE_DAY, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY')) AS Day,
GROUP_CONCAT(CONCAT_WS(' - ', c.SHIFT_START, c.SHIFT_END) ORDER BY  FIELD(a.SCHEDULE_DAY, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY')) AS Shift

FROM schedule a
INNER JOIN
employee b ON  a.SCHEDULE_EMPLOYEE_ID = b.EMPLOYEE_ID
INNER JOIN
shift c ON a.SCHEDULE_SHIFT_ID = c.SHIFT_ID
group by b.EMPLOYEE_FNAME

;        ");

$result = $mysqli->query($sql) or die($mysqli->error);
$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}
echo json_encode($array_result);
