<html>
    <?php include("Header.php"); ?>
    <body>    
        <h1>VEHICLE REPAIR PAGE (EMPLOYEE)</h1>
        <form action="set_vehicle_repairs_function.php" method="POST" >
            
            <font color="red">CAR VIN:</font> <input type="text" name="test_vin"><br>
            Set Repair Status: <select name="repair">
                <option value="">--Schedule-Repairs--</option>
                <option>YES</option>
                <option>NO</option>
            </select><br>    
            <input type="submit" value="Update Status"/>
        </form>
    </body>
    <?php include("Footer.php"); ?>
</html>