<?php

session_start();

$con=mysqli_connect("localhost","root","CPSC471!","final_project");

if (mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST["username"]) && isset($_POST["password"])){
    $accounts = mysqli_query($con, 'SELECT * FROM customer');
    while ($row = mysqli_fetch_array($accounts)){
        if ($row['customer_username'] == $_POST["username"]){
            passwordCheck($row);
        }
    }
    header('Location: http://localhost/471FinalProj/logged_in.php');
}

function passwordCheck($toCheck){
    
    $con=mysqli_connect("localhost","root","CPSC471!","final_project");
    if ($toCheck['customer_password'] == $_POST["password"]){
        $_SESSION['name'] = $toCheck['customer_username'];
        if ($toCheck['customer_id'] == 0){
            $_SESSION['type'] = 'A';
            $_SESSION['id'] = $toCheck['customer_id'];
        }
        else{
            $_SESSION['type'] = 'C';
            $_SESSION['id'] = $toCheck['customer_id']; 
        }

        header('Location: http://localhost/471FinalProj/logged_in.php');
    }
}
?>


