<?php
include 'SessionLogin.php';

//$sql = ("SELECT DISTINCT
//b.EMPLOYEE_FNAME AS Name,
//GROUP_CONCAT(a.SCHEDULE_DAY ORDER BY FIELD(a.SCHEDULE_DAY, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY')) AS Day,
//GROUP_CONCAT(CONCAT_WS(' - ', c.SHIFT_START, c.SHIFT_END) ORDER BY  FIELD(a.SCHEDULE_DAY, 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY')) AS Shift
//
//FROM schedule a
//INNER JOIN
//employee b ON  a.SCHEDULE_EMPLOYEE_ID = b.EMPLOYEE_ID
//INNER JOIN
//shift c ON a.SCHEDULE_SHIFT_ID = c.SHIFT_ID
//group by b.EMPLOYEE_FNAME
//
//;        ");

$sql = ("SELECT
b.first_name,
group_concat(a.date order by a.date) as date,
group_concat(CONCAT_WS(' - ', c.start_time, c.end_time)) as shift
from schedule a
inner join
employee b on b.employee_id = a.employee_id
inner join
shifts c on c.shift_id = a.shift_id
where a.date >= '".$_POST['startDate']."' and a.date <= '".$_POST['endDate']."'
group by b.first_name;       ");


$result = $mysqli->query($sql) or die($mysqli->error);
$array_result = array();
while($row = $result->fetch_assoc()){
    array_push($array_result, $row);
}

$jsonData = json_encode($array_result);
echo $jsonData;
