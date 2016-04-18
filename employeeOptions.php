<?php include("Header.php"); 
    if ($_SESSION['type']!='E'){
        //echo $_SESSION['type'];
        exit;
    }
?>
        <div id="main" align="center">
            <h1>Employee Options</h1>
            
            <br><h2>Create New Customer</h2>
            <form action="register.php" method="POST" >  
                <input type="submit" value="Signup a new customer"/> 
            </form>
            
            <h2>Edit Customer Information</h2>
            <form action="customer_edit_page.php" method="POST" >  
                Enter Customer ID: <br><input type="text" name="tester_cid" required=""></br> <input type="submit" value="submit"/> </br>
            </form>
                                     
            <br><h2>Search and rent a Car</h2>
            <form action="cars.php" method="POST" >  
            <input type="submit" value="Search for cars"/> 
            </form>
                 
            
        </div>
<?php include("Footer.php");?>
