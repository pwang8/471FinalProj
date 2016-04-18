<?php

include("Header.php");

$tester_cid = $_POST['tester_cid'];
$new_fname = $_POST['f_name'];
$new_lname = $_POST['l_name'];
$new_address = $_POST['address'];
$new_phone = $_POST['phone_number'];
$new_country = $_POST['country'];
$new_email = $_POST['email_address'];

$update_query = "UPDATE customer "
        . "SET f_name='".$new_fname."'"
        . ", l_name='".$new_lname."'"
        . ", email='".$new_email."'"
        . ", address='".$new_address."'"
        . ", phone='".$new_phone."'"
        . ", country='".$new_country."'"
        . ", email_address='".$new_email."'"
        . " WHERE CID=".$tester_cid;
echo $update_query;
if (!mysqli_query($con,$update_query)){
    die('Error: ' . mysqli_error($con));
}
else
    echo "1 record changed";

include("Footer.php");
?>

