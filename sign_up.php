  
<?php include("Header.php"); ?> 
<div id="main">
<center><h1>New Customer Sign up</h1> </center>
    <center>      
       
        <form name = "signup" method="POST" action="sign_up_webservice.php">
            
              
                Firstname:  <br><input type="text" name="fname" required><br>
                Lastname:   <br><input type="text" name="lname" required><br>
                Username: <br><input type = "text" name = "username" required> </br>
                Password: <br> <input type = "password" name = "password" required> </br>
                Email:<br><input type="email" name="email" required><br>
                Address:<br><input type="text" name="address" required><br>
                Country:<br><input type="text" name="city" required><br>
                Phone number: <br><input type="tel" name="phone" placeholder = "xxx-xxx-xxxx" pattern="\d{3}-?\d{3}-?\d{4}" ><br>
                </select><br>
                
                 <br><input type="submit" name = "submit" value= "Submit"/></br>
        </form>
        </div>
    </center>
<?php include("Footer.php"); ?>

