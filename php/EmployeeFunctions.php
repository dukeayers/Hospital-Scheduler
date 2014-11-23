/*Insert new employee*/
INSERT INTO 'employee'
VALUES ($wantedID, $firstName, $lastName, $userName, $password);

/*Change shift time*/
IF $admin_response = "yes"
	BEGIN
		UPDATE 'schedule'
		SET 'Start_Time' = $shiftStart, 'End_Time' = $shiftEnd;
		WHERE 'Shift_ID' = $wantedID;
		
/*Approve Vacation*/
IF $admin_response = "yes"
	BEGIN
		UPDATE 'req_time_off'
		SET 'Date' = $enterDate, 'Day' = $getDay,
			'Description' = $getDescription, 'Approved' = 1;
		WHERE 'Employee_ID' = $wantedID AND 'RTO_ID' = $getRTO;
		

/*Remove employee*/
DELETE FROM 'employee'
WHERE 'Employee_ID'=$wantedID;
