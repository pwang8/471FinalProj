<html>
    <?php include("Header.php"); ?>
    <body> 
        <div id="main" align="center">
        <h1>Add Car Page (ADMIN)</h1>
            <form action="car_add_function.php" method="POST" >  
                
                Availability: <select name="availability" required>
                    <option value="NO">--Availability--</option>
                    <option>YES</option>
                    <option>NO</option>
                </select><br>
                Type: <select name="type" required>
                    <option value="">--Type--</option>
                    <option>Economy</option>
                    <option>Family</option>
                    <option>Sedan</option>
                    <option>Luxury</option>
                    <option>Sports</option>
                    <option>Off-roaders</option>
                    <option>Commercial</option>
                </select><br>
                Seats: <input type="text" name="seats" required><br>
                Rate: <input type="text" name="rate" required><br>
                Color: <select type name="color" required>
                    <option value="">--Color--</option>
                    <option>Red</option>
                    <option>Blue</option>
                    <option>Black</option>
                    <option>White</option>
                    <option>Silver</option>
                </select><br>
                Model: <input type="text" name="model" required><br>
                <input type="submit"/>
                 
            </form>
    </div>
    </body>
    <?php include("Footer.php"); ?>
</html>