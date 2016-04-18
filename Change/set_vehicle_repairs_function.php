 <?php
    include("Header.php");

    $repair_status = $_POST['repair'];
    $tester_vin = $_POST['test_vin'];

    $sql = mysqli_query($con, "SELECT REPAIR_FLAG FROM car WHERE VIN='".$tester_vin."'");

    if($repair_status !="" and $tester_vin != "")
    {
        $update_query = "UPDATE car SET REPAIR_FLAG='".$repair_status."' WHERE VIN='".$tester_vin."'";
        while ($row4 = mysqli_fetch_array($sql)){
            if (!mysqli_query($con,$update_query))
                {
                die('Error: ' . mysqli_error($con));
                }else {
                    echo "Car status set: ".$repair_status."<br>";
                }
            // Message
            echo $update_query."<p>";
        }
    }

    include("Footer.php");
?>
