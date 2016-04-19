
<?php
include("Header.php");
echo '<div id="main">';
$availabilities = $_POST['availability'];
$types = $_POST['type'];
$seats = $_POST['seats'];
$rates = $_POST['rate'];
$colors = $_POST['color'];
$models = $_POST['model'];
$stringQuery1 = 'SELECT * FROM car WHERE TRUE';

//echo "--Debugger--";
//echo "<p>".$stringQuery1."<p>";
if($_POST['availability'] != "")
{
    //echo "Availablity: ".$availabilities."<br>";
    $stringQuery1 = $stringQuery1.' AND AVAILABILITY = "'.$availabilities.'"';
    //echo $stringQuery1."<p>";
}
if($_POST['type'] != "")
{
    //echo "Type: ".$types."<br>";
    $stringQuery1 = $stringQuery1.' AND TYPE = "'.$types.'"';
    //echo $stringQuery1."<p>";
}
if($_POST['seats'] != "")
{
    //echo "Seats: ".$seats."<br>";
    $stringQuery1 = $stringQuery1.' AND SEATS = "'.$seats.'"';
    //echo $stringQuery1."<p>";
}
if($_POST['rate'] != "")
{
    //echo "Rate: ".$rates."<br>";
    $stringQuery1 = $stringQuery1.' AND RATE = "'.$rates.'"';
    //echo $stringQuery1."<p>";
}
if($_POST['color'] != "")
{
    //echo "Color: ".$colors."<br>";
    $stringQuery1 = $stringQuery1.' AND COLOR = "'.$colors.'"';
    //echo $stringQuery1."<p>";
}
if($_POST['model'] != "")
{
    //echo "Model: ".$models."<br>";
    $stringQuery1 = $stringQuery1.' AND MODEL = "'.$models.'"';
    //echo $stringQuery1."<p>";
}
//$stringQuery = 'SELECT * FROM customer WHERE TRUE AND FNAME ="'.$availabilities.'"';
//echo '<br>Results:';
/*$sql = mysqli_query($con, $stringQuery1);
while ($row = mysqli_fetch_array($sql)){
echo '<br>'.$row['AVAILABILITY']
        .' '.$row['TYPE']
        .' '.$row['SEATS'];
}*/
?>
   

    <table border="1" style="width:100%;background:#2dabf9;margin-top:20px">
            <tr>
                <th>Type</th>
                <th>Seats</th>
                <th>Rate</th>
                <th>Color</th>
                <th>Model</th>
                <th>Book</th>
            </tr>
            <?php
                //$stringQuery1 = $stringQuery1 . ' GROUP BY "model"';
                //echo $stringQuery1;
                $sql = mysqli_query($con, $stringQuery1);
                while ($row = mysqli_fetch_array($sql)) {
                   echo "<tr>";
                   echo "<td>".$row['TYPE']."</td>";
                   echo "<td>".$row['SEATS']."</td>";
                   echo "<td>".$row['RATE']."</td>";
                   echo "<td>".$row['COLOR']."</td>";
                   echo "<td>".$row['MODEL']."</td>";
                   echo "<td align='center'><button id='submit' onclick=\"bookCar(" .$row['VIN']. ", " .$_SESSION['id']. ", '" .$row['MODEL']. "')\">select</td>";
                   echo "</tr>";
                }

            ?>

    </table>
<form id="rent_vehicle_form" style="margin-top:20px" action="rent_vehicle_function.php" method="POST" >  

            <input id="form_cid" type="hidden" name="test_cid">
            <input id="form_vin" type="hidden" name="test_vin">
            
            <table style="background:#2dabf9" align="center" border="1">
                <tr>
                    <th>Selection</th>
                    <th>Start date</th>
                    <th>End date</th>
                    <td></td>
                </tr>
                <tr>
                    <td><input id="form_selection" type="text" readonly</td>
                    <td><input type="date" name="start_date" required></td>
                    <td><input type="date" name="end_date" required></td>
                    <td><input type="submit" value="Book"/></td>
                </tr>
            </table>
        </form>
                
<?php echo '</div>';
include("Footer.php");?>
<script>
function bookCar(carVIN, customerID, model){
    document.getElementById("form_cid").value=customerID;
    document.getElementById("form_vin").value=carVIN;
    document.getElementById("form_selection").value=model;
    //var tojump = document.getElementById("rent_vehicle_form");
    //divid.style.display = 'block';
    //tojump.scrollIntoView(true);
}
</script>