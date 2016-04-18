 <?php include("Header.php"); ?>
        <div id="main" align="center">
            <h1>Admin Options</h1>
            
            <br><h2>Add a new Customer</h2>
            <form action="register.php" method="POST" >  
                <input type="submit" value="Add a new customer"/> 
            </form>
            
            <h2>Edit Customer Information</h2>
            <form action="customer_edit_page.php" method="POST" >  
                Enter Customer ID: <br><input type="text" name="tester_cid" required=""></br>
                <input type="submit" value="submit"/> </br>
            </form>
            
            <!--<br><h2>Delete a Customer</h2>       
            <form action="delete_a_customer.php" method="POST" >  
                Enter Customer ID: <br><input type="text" name="tester_cid" required=""></br>
                <input type="submit" value="Delete customer"/> </br>
            </form>-->
            
             <br><h2>Add a new Car</h2>
             <form action="car_add_page.php" method="POST" >  
                <input type="submit" value="Add a new car"/> 
            </form>
             
            <!--<br><h2>Delete a new Car</h2>
            
            <form action="delete_a_car.php" method="POST" >  
                Enter Car VIN: <br><input type="text" name="tester_cid" required=""></br>
                <input type="submit" value="Delete the car"/> </br>
            </form>-->
             
            
            <br><h2>Add a new Employee</h2>
            <form action="Add_employee.php" method="POST" >  
                <input type="submit" value="Add a new Employee"/> 
            </form>
            
            <!--<br><h2>Delete an Employee</h2>
            <form action="delete_an_employee.php" method="POST" >  
                Enter Car VIN: <br><input type="text" name="tester_EID" required=""></br>
                <input type="submit" value="Delete Employee"/> </br>
            </form>-->
                
                
            <br><h2>Search and rent a Car</h2>
            <form action="cars.php" method="POST" >  
            <input type="submit" value="Search for cars"/> 
            </form>
                
            
                 
            
        </div>
<?php include("Footer.php");?>
