 <?php include("Header.php"); ?>

        <div align="center" id = "main">
            <h1>About Rent-A-Car</h1>
                <p>Rent-A-Car is a world leader in car rental service industry. We pride ourselves in
                in offering the safest, in-demand vehicles for an unbeatable price. Our staff area
                always ready to help and insure you will be happy with your drive, wherever your 
                destination may be.</p>
            <h1>About Us</h1>
            <p>Rent-A-Car is currently owned by original four creators; Mackenzie, Jan, Shadda, and Dlanyer.
            The creators were inspired to make this striving business, because... it's an assignment.</p>
            
            <p>Enjoy!</p>
            <p><?php session_start();
                    echo $_SESSION['user'];
                ?></p>

            
        </div>
          
<?php include("Footer.php"); ?>

