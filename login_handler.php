<?php

session_start();
$con=mysqli_connect("localhost","root","root","rent_a_car");
if (mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST["userid"]) && isset($_POST["password"])){
    $accounts = mysqli_query($con, 'SELECT * FROM account');
    while ($row = mysqli_fetch_array($accounts)){
        if ($row['USERNAME'] == $_POST["userid"]){
            passwordCheck($row);
        }
    }
    header('Location: http://localhost:8888/CarRental/welcome.php');
}

function passwordCheck($toCheck){
    
    $con=mysqli_connect("localhost","root","root","rent_a_car");
    if ($toCheck['PASSWORD'] == $_POST["password"]){
        $_SESSION['type'] = $toCheck['TYPE'];     //change this to whatever type account is
        $_SESSION['name'] = $toCheck['USERNAME'];
        if ($_SESSION['type'] == 'C'){
            $account = mysqli_query($con, 'SELECT * FROM customer INNER JOIN account ON customer.CID=account.ACCOUNTID WHERE account.USERNAME = "' . $toCheck['USERNAME'] . '"');
            $info = mysqli_fetch_array($account);
            $_SESSION['id'] = $info['CID'];
        }
        elseif ($_SESSION['type'] == 'E' || $_SESSION['type'] == 'A'){
            $account = mysqli_query($con, 'SELECT * FROM employee INNER JOIN account ON employee.EID=account.ACCOUNTID WHERE account.USERNAME = "' . $toCheck['USERNAME'] . '"');
            $info = mysqli_fetch_array($account);
            $_SESSION['id'] = $info['EID'];
        }
        header('Location: http://localhost:8888/CarRental/welcome.php');

        
    }
}
?>


