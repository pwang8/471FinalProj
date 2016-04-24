 <?php include("Header.php"); ?>

        <div align="center" id = "main">
            <h1>About Shopping webservice</h1>
                <p>Shopping webservice is a template service company  that allows the users(owner of shopping company) 
                to upload the products they wish to sell, allowing the customers to shop.  We pride ourselves in
                in offering the cheapest, and most user friendly interface in North America</p>
            <h1>About Us</h1>
            <p>Rent-A-Car is currently owned by three creators; Paul Wang, Chris Neave , SanHa Kim</p>
            
            <p>Enjoy!</p>
            <p><?php session_start();
                    echo $_SESSION['user'];
                ?></p>

            
        </div>
          
<?php include("Footer.php"); ?>

