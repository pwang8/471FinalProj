<html>
    <?php include("Header.php"); ?>
    <body> 
        <div id="main" align="center">
        <h1>Add Product </h1>
            <form action="add_product_webservice.php" method="POST" >  
                
                Name: <select name="availability" required>
                    <option value="NO">--Availability--</option>
                    <option>YES</option>
                    <option>NO</option>
                </select><br>
                Image: <select name="type" required>
                    <option value="">--Type--</option>
                    <option>Economy</option>
                    <option>Family</option>
                    <option>Sedan</option>
                    <option>Luxury</option>
                    <option>Sports</option>
                    <option>Off-roaders</option>
                    <option>Commercial</option>
                </select><br>
                Stock: <input type="text" name="stock" required><br>
                Price: <input type="text" name="price" required><br>
                Description: <input type name="description" required>

                </select><br>
                Model: <input type="text" name="model" required><br>
                <input type="submit"/>
                 
            </form>
    </div>
    </body>
    <?php include("Footer.php"); ?>
</html>