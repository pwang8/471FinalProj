<html>
    <?php include("Header.php"); ?>
    <body>    
        <h1>BOOK CAR PAGE (CUSTOMER)</h1>
        <form action="rent_vehicle_function.php" method="POST" >  
            
            <font color="red">YOUR CID:</font> <input type="text" name="test_cid"><br>
            <font color="red">WANTED CAR VIN:</font> <input type="text" name="test_vin"><br>
            Start Date: <input type="date" name="start_date"><br>
            End Date: <input type="date" name="end_date"><br>

            <input type="submit" value="Book car"/>
        </form>
    </body>
    <?php include("Footer.php"); ?>
</html>