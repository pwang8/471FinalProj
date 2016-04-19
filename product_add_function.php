<?php

include("Header.php");

$availability = $_POST["availability"];
$category = $_POST["category"];
$price = $_POST["price"];
$stock = $_POST["stock"];

$sql= "INSERT INTO product(VIN,AVAILABILITY,CATEGORY,PRICE,STOCK) VALUES ('','$availability','$category','$price','$stock')";
if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else
echo "1 record added";

include("Footer.php");
