<html>
    <?php include("Header.php"); ?>
    <body> 
        <div id="main" align="center">
        <h1>Add Product Page (ADMIN)</h1>
            <form action="product_add_function.php" method="POST" >
                Product Name: <input type="text" name="name" required><br>
                Image URL: <input type="text" name="imageUrl"><br>
                Category: <select name="category" required>
                    <option value="">--Category--</option>
                    <?php 
                        $sql = mysqli_query($con, "SELECT DISTINCT category_name FROM categories");
                        while ($row = mysqli_fetch_row($sql))
                        {
                            echo '<option>'.$row[0].'</option>';
                        }
                        
                    ?>
                </select><br>
                Stock: <input type="text" name="stock" required><br>
                Price: <input type="text" name="price" required><br>
                Description: <input type="text" name="desc" required><br>
                </select><br>
                <input type="submit"/>
                 
            </form>
    </div>
    </body>
    <?php include("Footer.php"); ?>
</html>