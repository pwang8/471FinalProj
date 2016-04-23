 <?php include("Header.php"); ?>
        <div id="main" align="center">
            <h1>Admin Options</h1>
            
            
             <br><h2>Add a new Product</h2>
             <form action="product_add_page.php" method="POST" >  
                <input type="submit" value="Add a new product"/> 
            </form>
            
            <br><h2>Remove a Product</h2>
            <form action="product_remove_page.php" method="POST" >  
                <input type="submit" value="Remove a product"/> </br>
            </form>
        </div>
<?php include("Footer.php");?>
