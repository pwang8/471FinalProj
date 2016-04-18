<?php

include("Header.php");

$tester_cid = $_POST['tester_cid'];

$update_fname = $_POST['fname'];
$update_lname = $_POST['lname'];
$update_minit = $_POST['minit'];
$update_age = (is_numeric($_POST['age']) ? (int)$_POST['age']:0);
$update_email = $_POST['email'];
$update_stname = $_POST['stname'];
$update_city = $_POST['city'];
$update_postc = $_POST['postc'];
$update_phone = $_POST['phone'];

$update_query = "UPDATE customer "
        . "SET FNAME='".$update_fname."'"
        . ", LNAME='".$update_lname."'"
        . ",MINIT='".$update_minit."'"
        . ",AGE='".$update_age."'"
        . ", EMAIL='".$update_email."'"
        . ", STREETNAME='".$update_stname."'"
        . ", CITY='".$update_city."'"
        . ", POSTALCODE='".$update_postc."'"
        . ", PHONE='".$update_phone."'"
        
        . " WHERE CID=".$tester_cid;
echo $update_query;
if (!mysqli_query($con,$update_query)){
    die('Error: ' . mysqli_error($con));
}
else
    echo "1 record changed";

include("Footer.php");
?>

