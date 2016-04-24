<?php 
include ("Header.php");

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$username = $_POST ["username"];
$password = $_POST ["password"];
$email = $_POST ["email"];
$address = $_POST ["address"];
$country = $_POST ["country"];
$phone = $_POST ["phone"];
// Create connection
$con=mysqli_connect('localhost','root','CPSC471!','final_project');
// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT customer_username From customer Where customer_username = '".$username."'";
if ((!($usernames_found=mysqli_query($con,$sql))))
{
    die('Error: ' . mysqli_error($con));
}
// if the number of usernames found is 0, this means that no customer exists with this username
if (($rows = mysqli_num_rows($usernames_found))==0)
{
    $sql1= "INSERT INTO customer (customer_id,f_name,l_name,address,phone_number,country, customer_username, customer_password, email_address)
        VALUES (NULL,'".$fname."','".$lname."','".$address."','".$phone."','".$country."','".$username."','".$password."','".$email."')";
    if ((!mysqli_query($con,$sql1)))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {  
        echo
        "<script>
            alert('User successfully added');
            window.location.href='http://localhost/471FinalProj/index.php';
        </script>"; 
    }

}
else
{
   echo 
   "<script>
        alert('A user already exists with the same username. Use a different username');
        window.location.href='http://localhost/471FinalProj/sign_up.php';
    </script>"; 
}
?>
<?php include ("Footer.php")?>