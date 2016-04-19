<html>
    <?php include("Header.php"); ?>
    <body>    
        <h1>Remove Product Page (ADMIN)</h1>
        <form action="product_remove_function.php" method="POST" >  
            <font>Product ID</font> <input type="text" name="product_id" required><br>
            <input type="submit" value="Submit">
        </form>
    </body>
    <?php include("Footer.php"); ?>
</html>