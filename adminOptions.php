 <?php include("Header.php"); ?>
        <div id="main" align="center">
            <h1>Admin Options</h1>
                        
            <br><h2>Display Purchased Products</h2>
            <form action="displayPurchase.php" method="POST" >  
                <input type="submit" value="Display Purchased Products"/> 
            </form>
            <br><h2>Display Registered Customers</h2>
            <form action="customer.php" method="POST" >  
                <input type="submit" value="Display Registered Customers"/> 
            </form>
            
             <br><h2>Add a New Product</h2>
             <form action="product_add_page.php" method="POST" >  
                <input type="submit" value="Add a New Product"/> 
            </form>
            
            <br><h2>Remove a Product</h2>
            <form action="product_remove_page.php" method="POST" >  
                <input type="submit" value="Remove a Product"/> </br>
            </form>
        </div>
<?php include("Footer.php");?>
