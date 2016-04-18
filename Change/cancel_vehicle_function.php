 <?php
    include("Header.php");

    $tester_cid = $_POST['test_cid'];
    $tester_vin = $_POST['test_vin'];
    $date_cancel = $_POST['start_date'];
    
    
    if($tester_cid !="" and $tester_vin != "" and $date_cancel != "")
    {

        $sql1 = "UPDATE car SET CCID='".$tester_cid."' WHERE VIN='".$tester_vin."'";
        if (!mysqli_query($con,$sql1))
        {
            die('Error: ' . mysqli_error($con));
        }
        else 
        {
           
            $sql2= "DELETE FROM booking WHERE BCID='".$tester_cid."' and BVIN='".$tester_vin."' and START='".$date_cancel."'";
            //$sql2= "DELETE booking ";

            if (!mysqli_query($con,$sql2))
            {
                die('Error: ' . mysqli_error($con));
            }else {
                echo "<script>
                alert('Booking cancelled');
                window.location.href='http://localhost:8888/CarRental/profile.php';
                </script>";
               // echo "Booking cancelled.<br>";
            }
        }    
    }
    else
    {
        echo "No such booking.";
    }

    include("Footer.php");
?>
