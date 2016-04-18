<?php include("Header.php");
    $customer_ID = $_POST['tester_cid'];
    $query = 'SELECT * FROM CUSTOMER WHERE CID ="' .$customer_ID.'"';
    $sql = mysqli_query($con, $query); //join with customer table or others
    $userinfo = mysqli_fetch_array($sql);
    
    if (mysqli_num_rows($sql) == 0){
        echo "<script>
        alert('No user exists with that customer ID\\nClick OK to return to previous page');
        window.location.href='http://localhost:8888/CarRental/employeeOptions.php';
        </script>";
    }
?>
        <div align="center" id="main">  
        <center><h1>Edit Customer Information</h1></center>
        <center> 
        <form id="form_edit_customer" action="customer_update_function.php" method="POST" >  
                
            Your ID:<br><input type="text" name="tester_cid" readonly value="<?php echo $userinfo['CID'];?>"><br>               
            First Name: <br><input type="text" name="fname" value="<?php echo $userinfo['FNAME'];?>"><br>
            Last Name:<br> <input type="text" name="lname" value="<?php echo $userinfo['LNAME'];?>"><br>
            Middle Initial: <br><input type="text" name="minit" value="<?php echo $userinfo['MINIT'];?>"><br>
            Age:<br> <input type="text" name="age" value="<?php echo $userinfo['AGE'];?>"><br>
            Email: <br><input type="text" name="email" value="<?php echo $userinfo['EMAIL'];?>"><br>
            Street Name:<br> <input type="text" name="stname" value="<?php echo $userinfo['STREETNAME'];?>"><br>
            City:<br> <input type="text" name="city" value="<?php echo $userinfo['CITY'];?>"><br>
            Postal code: <br> <input type="text" name="postc" value="<?php echo $userinfo['POSTALCODE'];?>"><br>
            Phone:<br> <input type="text" name="phone"value="<?php echo $userinfo['PHONE'];?>"><br>
            <input id="editButton" type="submit" value = "Edit"/>
        </form>
            
        </div>
<?php
    
?>

    <?php include("Footer.php"); ?>