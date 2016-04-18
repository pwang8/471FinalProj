<?php
    include("Header.php");

    $tester_cid = $_POST['test_cid'];
    $tester_vin = $_POST['test_vin'];
    $book_start_date = $_POST['start_date'];
    $book_end_date = $_POST['end_date'];
    
    /*echo $tester_cid."<br>";
    echo $tester_vin."<br>";
    echo $book_start_date."<br>";
    echo $book_end_date."<br>";*/
    
    if($tester_cid !="" and $tester_vin != "" and $book_start_date != '' and $book_end_date != '')
    {

        $sql_query1 = "SELECT VIN, START, END, car.RATE "
                . "FROM car "
                . "LEFT OUTER JOIN booking "
                . "ON car.VIN=booking.BVIN "
                . "WHERE VIN = '".$tester_vin."'"
                . " ORDER BY START DESC LIMIT 1";
        $sql = mysqli_query($con,$sql_query1);
        //echo $sql_query1;

            while ($row = mysqli_fetch_array($sql))
            {   
                if (($book_start_date > $row['END'] and $book_end_date > $book_start_date) or 
                        ($book_end_date < $row['START'] and $book_start_date < $book_end_date) or 
                        $row['START'] = NULL or 
                        $row['END'] = NULL)
                {
                        $sql1 = "UPDATE car SET CCID= '".$tester_cid."' WHERE VIN= '".$tester_vin."'";
                        //echo "<br>".$sql1."<br>";
                        if (!mysqli_query($con,$sql1))
                        {
                            die('Error: ' . mysqli_error($con));
                        }
                        else 
                        {
                            $sql_query2= "INSERT INTO booking(BCID,BVIN,START,END,RATE) VALUES ('".$tester_cid."','".$tester_vin."','".$book_start_date."','".$book_end_date."','".$row['RATE']."')";
                            if (!mysqli_query($con,$sql_query2))
                            {
                                echo "<div align='center' id='main'><h2>booking error</h2><p>the car is not available for the dates you have selected</p>";
                                echo "</div>";
                                die();
                                
                            }else {
                                //echo "Car booked.<br>";
                                echo "<div align='center' id='main'><h2>Successfully booked!</h2>";
                                echo "<table border=1>";
                                echo "<tr><th>Car</th><th>Start date</th><th>End date</th></tr>";
                                echo "<tr><td></td><td>".$row['START']."</td><td>".$row['END']."</td>";
                            }
                        }

                    
                } else {
                    echo "<p>Cannot book at that time";
                    echo "<div align='center' id='main'><h2>booking error</h2><p>the car is not available for the dates you have selected</p>";
                    echo "</div>";
                }
            }
    }


    include("Footer.php");
?>

