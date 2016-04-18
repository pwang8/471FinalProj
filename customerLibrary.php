<?php

include("Header.php");

$tester_cid = $_POST['tester_cid'];

$update_fname = $_POST['f_name'];
$update_lname = $_POST['l_name'];
$update_email = $_POST['address'];
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

