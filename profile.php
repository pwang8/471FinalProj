<?php include("Header.php");
    $userinfo="";
    $query = 'SELECT * FROM customer WHERE customer_id = '.$_SESSION['id'];
    $sql = mysqli_query($con, $query); //join with customer table or others
    $userinfo = mysqli_fetch_array($sql);

    ?>
    
<div align="center" id="main" class="window">                                                     <!--more details. add edit function unless someone has it done already-->
    <h1>Profile details</h1>
    <h2>View and change profile information here</h2>
    <p>Your username is: <?php echo $userinfo['customer_username']; ?> </p>
    
    
    <form action="customer_update_function.php" method="POST" >  
                
            Your ID:<br><input type="text" name="tester_cid" readonly value="<?php echo $userinfo['customer_id'];?>"><br>               
            First Name: <br><input type="text" name="fname" value="<?php echo $userinfo['f_name'];?>"><br>
            Last Name:<br> <input type="text" name="lname" value="<?php echo $userinfo['l_name'];?>"><br>
            Address:<br> <input type="text" name="address" value="<?php echo $userinfo['address'];?>"><br>
            Phone:<br> <input type="text" name="phone"value="<?php echo $userinfo['phone_number'];?>"><br>
            Country:<br> <input type="text" name="country"value="<?php echo $userinfo['country'];?>"><br>
            Email: <br><input type="text" name="email" value="<?php echo $userinfo['email_address'];?>"><br>
            <input type="submit" class="submitButton" value="Update"/>
    </form>
    
    
    <center>   
    <form align='center' style="margin-top: 50px" action="logout.php">
        <input type="submit" class="submitButton" value="Log out">
    </form>
    </center>
</div>
<?php include("Footer.php");?>

