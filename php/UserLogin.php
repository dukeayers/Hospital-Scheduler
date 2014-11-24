<?php
include 'SessionLogin.php'; //Including Database info
if (isset($_POST['user']) && isset($_POST['pass']))
{
    $user = mysqli_real_escape_string($mysqli, $_POST['user']) ;
    $pass = $_POST['pass'] ;
    $pass_hash = mysqli_real_escape_string($mysqli, md5($pass));
    $err = 0;


    if (!empty($user) && !empty($pass_hash)){
        $result = mysqli_query($mysqli, "SELECT * FROM `employee` WHERE Username = '$user' AND Password = '$pass_hash' ORDER BY `Employee_ID`") or die (mysqli_error($mysqli));
        $num_rows = mysqli_num_rows($result);
        if($num_rows==0) {
            $err = 2;
            printf("Username And Password combination not found in database.");
            header('Refresh:5; ../login.php');
            exit;
        }
        else if ($num_rows==1){
            $_SESSION["logged_in"] = 1;
            printf("Login Successful, redirecting in 5s.");
            header("Refresh:5; ../calendarView.php");
            exit;
        }
    } else {
        $err = 1;
        printf("Username and/or Password field left empty.");
        header('Refresh:5; ../login.php');
        exit;
        }
} else {
    printf("Please use the form to login.");
    header('Refresh:5; ../login.php');
    exit;
}
?>
