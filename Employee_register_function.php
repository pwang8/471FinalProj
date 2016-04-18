<?php 
include ("Header.php");
//echo "this is the register_function page";
// I need to update this page to be able to register an employee by the admin only
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$minit = $_POST ["minit"];
$username = $_POST ["username"];
$password = $_POST ["password"];
$bdate = $_POST ["bdate"];
$salary = $_POST ["salary"];
$sex = $_POST ["sex"];
$address = $_POST ["address"];
$city = $_POST ["city"];
$postalcode = $_POST ["postalcode"];
$phone = $_POST ["phone"];
$type = $_POST ["type"];
//echo $fname. "<br>". $lname. "<br>";
// Create connection
$con=mysqli_connect('localhost','root','root','rent_a_car');
// Check connection
if (mysqli_connect_errno($con))
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// first check if there is an already existing username in the database
$sql = "SELECT USERNAME From Account Where USERNAME = '".$username."'";
if ((!($usernames_found=mysqli_query($con,$sql))))
{
die('Error 123: ' . mysqli_error($con));
}
// if hte number of usernames found is 0, this means that no customer exists with this username
if (($rows = mysqli_num_rows($usernames_found))==0)
{
if ($type == "Admin")
{
 
$sql1= "INSERT INTO account (ACCOUNTID,USERNAME,PASSWORD,TYPE) VALUES ('','$username', '$password', 'A')";
}
else if ($type == "non-admin")
{
    $sql1= "INSERT INTO account (ACCOUNTID,USERNAME,PASSWORD,TYPE) VALUES ('','$username', '$password', 'E')";
}
if ((!mysqli_query($con,$sql1)))
{
die('Error 456: ' . mysqli_error($con));
}
$insert_account_id = "SELECT ACCOUNTID from account WHERE USERNAME='".$username."' AND PASSWORD = '".$password."'";
$test = mysqli_query($con,$insert_account_id);
$account_id = mysqli_fetch_array($test)['ACCOUNTID'];
//echo $account_id;
$sql2= "INSERT INTO employee(EID,FNAME,LNAME,MINIT,BDATE,SALARY,STREETNAME,CITY,POSTALCODE,PHONE,SEX,ACCOUNTID) VALUES ('','$fname', '$lname' , '$minit', '$bdate', '$salary', '$address', '$city', '$postalcode', '$phone', '$sex', '$account_id')";
if ((!mysqli_query($con,$sql2)))
{
die('Error789: ' . mysqli_error($con));
}
else
{
//echo "you have successfully signed up";
//echo "1 record added";
    
    echo "<script>
    alert('The Employee was added successfully');
    window.location.href='http://localhost:8888/CarRental/adminOptions.php';
    </script>";
}
}
else 
{
    echo "<script>
    alert('A user already exists with the same username. Use a different username');
    window.location.href='http://localhost:8888/CarRental/Add_employee.php';
    </script>";
}
?>
<?php include ("Footer.php");
