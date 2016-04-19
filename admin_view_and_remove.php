<?php
session_start();

$con=mysqli_connect("localhost","root","CPSC471!","final_project");

if (mysqli_connect_errno($con)){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if($_SESSION['type'] != 'A'){
    echo "This page is restricted to logged in admins";
}

$sqlstatement = "SELECT * FROM product";

$products = mysqli_query($con, $sqlstatement);

$table = ""

while($row = mysqli_fetch_row($products){
    $table . "<tr>"
    $table . "<td>"
    $table . $row[0]
}
?>