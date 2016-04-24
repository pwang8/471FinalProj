 <?php include("Header.php"); ?>
        <div id="main" class="window" align="center">
            <h1>Admin Options</h1>
            <form action="displayPurchase.php" method="POST" >  
                <input type="submit" class="submitButton" value="Display Purchased Products"/> 
            </form>
            <form action="customer.php" method="POST" >  
                <input type="submit" class="submitButton" value="Display Registered Customers"/> 
            </form>
             <form action="product_add_page.php" method="POST" >  
                <input type="submit" class="submitButton" value="Add a New Product"/> 
            </form>
            <form action="product_remove_page.php" method="POST" >  
                <input type="submit" class="submitButton" value="Remove a Product"/> </br>
            </form>
        </div>
<?php include("Footer.php");?>
