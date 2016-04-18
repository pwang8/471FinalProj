
<?php include("Header.php"); ?> 
 <div id="main">
<center><h1>Add new Employee</h1> </center>
    <center>      
        <br>
        
        </br>
                
        <form name = "add_employee" method="POST" action="Employee_register_function.php">
            
              
                Firstname:  <br><input type="text" name="fname" required><br>
                Lastname:   <br><input type="text" name="lname" required><br>
                Middle Initial: <br><input type="text" name="minit"><br>
                Username: <br><input type = "text" name = "username" required> </br>
                Password: <br> <input type = "password" name = "password" required> </br>
                Birthday: <br><input type="date" name="bdate"required max="2015-12-03"><br>
                Salary: <br><input type="number" name="salary" required=""><br>
                Sex: <select name="sex" required >
                    <option value="">--Sex--</option>
                    <option>Female</option>
                    <option>Male</option>
                     </select><br> 
                Address:<br><input type="text" name="address" required><br>
                City:<br><input type="text" name="city" required><br>
                Postal Code: <br><input type="text" name="postalcode" required><br>
                Phone number: <br><input type="tel" name="phone" placeholder = "xxx-xxx-xxxx" pattern="\d{3}-?\d{3}-?\d{4}" ><br>
                Type : <select  name="type" required>
                    <option value="">--Type--</option>
                    <option>Admin</option>
                    <option> Not Admin</option>>
                </select><br>
                
                 <br><input type="submit" name = "submit" value= "Submit"/></br>
        </form>
    </center>
 </div>
<?php include("Footer.php"); ?>