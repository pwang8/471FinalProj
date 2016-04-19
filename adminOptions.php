 <?php include("Header.php"); ?>
        <div id="main" align="center">
            <h1>Admin Options</h1>
            
            <br><h2>Add a new Product</h2>
            <form action="car_add_page.php" method="POST" >  
                <input type="submit" value="Add a new product"/> 
            </form>
            
            <br><h2>View and Remove products</h2>
            
            <form action="admin_view_and_remove.php" method="POST" >  
                <input type="submit" value="View products"/> 
            </form>
            
            <br><h2>View customers</h2>
            
            <br><h2>View purchases</h2>
            
            <br><h2>Do something else</h2>
              
        </div>
<?php include("Footer.php");?>
