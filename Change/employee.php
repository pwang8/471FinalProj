<?php include("Header.php"); ?>
        <div id="main" align="center">
            <h1>Employee Options</h1>
            
            <p>Edit Customer Information</p>
             <form action="customer_update_function.php" method="POST" >  
                
            Your ID:<input id="form_id" type="text" name="tester_cid" value=""><br>            
            First Name: <input id="form_fname" type="text" name="fname" value=""><br>
            Last Name: <input id="form_lname" type="text" name="lname" value=""><br>
            Middle Initial: <input id="form_minit" type="text" name="minit" value=""><br>
            Age: <input id="form_age" type="text" name="age" value=""><br>
            Email: <input id="form_email" type="text" name="email" value=""><br>
            Street Name: <input id="form_stname" type="text" name="stname" value=""><br>
            City: <input id="form_city" type="text" name="city" value=""><br>
            Postal code: <input id="form_postc" type="text" name="postc" value=""><br>
            Phone: <input id="form_phone" type="text" name="phone"value=""><br>
            <input type="submit"/>
            </form>
            <button onclick="populate()">GO</button><br>   
            <p>Create New Customer</p>
            
            <p>Search a Car</p>
            
            <p>Rent a Car for Customer</p>
            
    <script type="text/javascript">
        function populate(){
            <?php 
            $querystring = 'SELECT * FROM customer WHERE customer.CID= "' . document.getElementById("form_id").value . '"';
            $query = mysqli_query($con, $querystring);
            $info = mysqli_fetch_array($query);
            ?>
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
            document.getElementById("form_fname").value="WHOA";
        }
    </script>      
        </div>
<?php include("Footer.php");?>
