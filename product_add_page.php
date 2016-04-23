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
                    <option>New Category</option>
                    <?php 
                        $sql = mysqli_query($con, "SELECT DISTINCT category FROM product");
                        while ($row = mysqli_fetch_row($sql))
                        {
                            echo '<option>'.$row[0].'</option>';
                        }
                    ?>
                </select>
                <input type="text" name="newCategory"><br>
                Stock: <input type="number" name="stock" required><br>
                Price: <input type="number" step="0.01" name="price" required><br>
                Description: <input type="text" name="desc" required><br>
                </select><br>
                <input type="submit"/>
                 
            </form>
    </div>
    </body>
    <?php include("Footer.php"); ?>
</html>