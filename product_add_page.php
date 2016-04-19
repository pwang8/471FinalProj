<html>
    <?php include("Header.php"); ?>
    <body> 
        <div id="main" align="center">
        <h1>Add Product Page (ADMIN)</h1>
            <form action="product_add_function.php" method="POST" >  
                
                Availability: <select name="availability" required>
                    <option value="NO">--Availability--</option>
                    <option>YES</option>
                    <option>NO</option>
                </select><br>
                Category: <select name="category" required>
                    <option value="">--Category--</option>
                    <option>Hats</option>
                    <option>Watch</option>
                    <option>Pants</option>
                    <option>Jackets</option>
                    <option>Sports</option>
                    <option>Shoes</option>
                    <option>Accessories</option>
                </select><br>
                Stock: <input type="text" name="stock" required><br>
                Price: <input type="text" name="price" required><br>

                </select><br>
                <input type="submit"/>
                 
            </form>
    </div>
    </body>
    <?php include("Footer.php"); ?>
</html>
