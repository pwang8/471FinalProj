<?php include("Header.php");
    $userinfo="";
    // the fields that will be shown depends on if the account is logged in as a customer or as an employee
//if ($_SESSION['type'] == 'c')
//{
    $query = 'SELECT * FROM CUSTOMER INNER JOIN ACCOUNT ON CUSTOMER.ACCOUNTID=ACCOUNT.ACCOUNTID WHERE ACCOUNT.USERNAME ="' . $_SESSION['name'] . '"';
    $sql = mysqli_query($con, $query); //join with customer table or others
    $userinfo = mysqli_fetch_array($sql);
//}
    ?>
<script>
    //document.getElementById("loginHTML").onmouseover = innerHTML='HHAHAHAHA';     //Change login button to log out on this page only
</script>
    
<div align="center" id="main">                                                     <!--more details. add edit function unless someone has it done already-->
    <h1>Profile details</h1>
    <h2>View and change profile information here</h2>
    <p>Your username is: <?php echo $userinfo['USERNAME']; ?> </p>
    <p onmouseover="innerHTML='Your password is: <?php echo $userinfo['PASSWORD']; ?>'" onmouseout="innerHTML='Your password is: [HOVER TO SEE]'">Your password is: [HOVER TO SEE] </p>
    
    
    <form action="customer_update_function.php" method="POST" >  
                
            Your ID:<br><input type="text" name="tester_cid" readonly value="<?php echo $userinfo['CID'];?>"><br>               
            First Name:<br> <input type="text" name="fname" value="<?php echo $userinfo['FNAME'];?>"><br>
            Last Name: <br><input type="text" name="lname" value="<?php echo $userinfo['LNAME'];?>"><br>
            Middle Initial: <br> <input type="text" name="minit" value="<?php echo $userinfo['MINIT'];?>"><br>
            Age: <br><input type="text" name="age" value="<?php echo $userinfo['AGE'];?>"><br>
            Email: <br><input type="text" name="email" value="<?php echo $userinfo['EMAIL'];?>"><br>
            Street Name:<br> <input type="text" name="stname" value="<?php echo $userinfo['STREETNAME'];?>"><br>
            City: <br><input type="text" name="city" value="<?php echo $userinfo['CITY'];?>"><br>
            Postal code:<br> <input type="text" name="postc" value="<?php echo $userinfo['POSTALCODE'];?>"><br>
            Phone: <br><input type="text" name="phone"value="<?php echo $userinfo['PHONE'];?>"><br>
            <input type="submit" value = "Update"/>
    </form>
    
    
    <center>   
    <form align='center' class='login' style="margin-top: 50px" action="logout.php">
        <input type="submit" value="Log out">
    </form>
    </center>
    
        
        <p>Booking History</p>
     <table border="1" style="width:100%;background:#2dabf9">
            <tr>
                <th>Type</th>
                <th>Seats</th>
                <th>Rate</th>
                <th>Color</th>
                <th>Model</th>
                <th>Start</th>
                <th>End</th>
                <th>Active</th>
                <th>Booking</th>
            </tr>
            <?php
                $query = "SELECT DISTINCT ACTIVE, TYPE, SEATS, car.RATE, COLOR, MODEL, START, BVIN, END FROM car INNER JOIN booking ON BCID=CCID AND BVIN=VIN";
                $sql = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($sql)) {
                   echo "<tr>";
                   echo "<td>".$row['TYPE']."</td>";
                   echo "<td>".$row['SEATS']."</td>";
                   echo "<td>".$row['RATE']."</td>";
                   echo "<td>".$row['COLOR']."</td>";
                   echo "<td>".$row['MODEL']."</td>";
                   echo "<td>".$row['START']."</td>";
                   echo "<td>".$row['END']."</td>";
                   echo "<td>".$row['ACTIVE']."</td>";
                   
                   echo $_SESSION['id'];
                   echo "<td align='center'><button id='submit' onclick=\"cancelCar(" .$row['BVIN']. ", " .$_SESSION['id']. ")\">Select</td>";
                   echo "</tr>";
                } 
            ?>
    </table>
<form id="cancel_vehicle_form" style="margin-top:20px" action="cancel_vehicle_function.php" method="POST" >
    <input id= "form_cid" type="hidden" name="test_cid"><br>
        <input id= "form_vin" type="hidden" name="test_vin"><br>
        <input id="form_start" type="date" name="start_date">
        <input type="submit" value="Cancel Rental"/>
    </form>
</div>
<?php include("Footer.php");?>
<script>
function cancelCar(id, BVIN){
    document.getElementById("form_cid").value=id;
    document.getElementById("form_vin").value=BVIN;
    //document.getElementById("form_start").value=START;
    var tojump = document.getElementById("cancel_vehicle_form");
    //divid.style.display = 'block';
    tojump.scrollIntoView(true);
}
</script>
<?php include("Footer.php");
function clearUser() {
    session_destroy();                  //destroys WHOLE session
    //$_SESSION['user'] = 'guest';      //changes user type back to guest
}?>