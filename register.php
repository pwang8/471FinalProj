  
<?php include("Header.php"); ?>
  
<div id="main">
<center><h1>New Customer Sign up</h1> </center>
    <center>      
       
        <form name = "signup" method="POST" action="register_function.php">
            
              
                Firstname:  <br><input type="text" name="fname" required><br>
                Lastname:   <br><input type="text" name="lname" required><br>
                Middle Initial: <br><input type="text" name="minit"><br>
                Username: <br><input type = "text" name = "username" required> </br>
                Password: <br> <input type = "password" name = "password" required> </br>
                Birthday: <br><input type="date" name="bdate"required><br>
                Age: <br><input type="number" name="age" min = "0" max="200" ><br>
                Sex: <select name="sex" required >
                    <option value="">--Sex--</option>
                    <option>Female</option>
                    <option>Male</option>
                     </select><br> 
                Email:<br><input type="email" name="email" required><br>
                Address:<br><input type="text" name="address" required><br>
                City:<br><input type="text" name="city" required><br>
                Postal Code: <br><input type="text" name="postalcode" required><br>
                Phone number: <br><input type="tel" name="phone" placeholder = "xxx-xxx-xxxx" pattern="\d{3}-?\d{3}-?\d{4}" ><br>
                Type : <select  name="type" required>
                    <option value="">--Type--</option>
                    <option>Customer</option>
                </select><br>
                
                 <br><input type="submit" name = "submit" value= "Submit"/></br>
        </form>
        </div>
    </center>
<?php include("Footer.php"); ?>

