 <?php include("Header.php"); ?>
        <div id="main" align="center">
            <h1>Admin Options</h1>
            
            <br><h2>Add a new Customer</h2>
            <form action="sign_up.php" method="POST" >  
                <input type="submit" value="Add a new customer"/> 
            </form>
            
            <h2>Edit Customer Information</h2>
            <form action="customer_edit_page.php" method="POST" >  
                Enter Customer ID: <br><input type="text" name="tester_cid" required=""></br>
                <input type="submit" value="submit"/> </br>
            </form>
            
            <br><h2>Display Purchased products</h2>
            <form action="purchase.php" method="POST" >  
                <input type="submit" value="Display purchased products"/> 
            </form>
            
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
