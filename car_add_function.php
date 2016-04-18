<?php

include("Header.php");

$availability = $_POST["availability"];
$type = $_POST["type"];
$seats = $_POST["seats"];
$rate = $_POST["rate"];
$color = $_POST["color"];
$model = $_POST["model"];

$sql= "INSERT INTO car(VIN,AVAILABILITY,TYPE,SEATS,RATE,COLOR,MODEL) VALUES ('','$availability','$type','$seats','$rate','$color','$model')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
echo "1 record added";

include("Footer.php");
