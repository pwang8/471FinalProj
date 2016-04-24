<?php include("Header.php"); ?>
<script>
function removeFromCart(p_id, session_id)
{
    
    var Webservice_URL = "http://localhost/471FinalProj/webservice.php"; 
    
    //AJAX Request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        //alert(xhttp.readyState+"<- rT, status ->"+xhttp.status);
        //REPLY FROM WEBSERVICE
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            //Receive and decode the response to JSON object
            var response = JSON.parse(xhttp.responseText);
            //Check if the success returned was false
            if (!response.success)
            {
                alert(response.message); //Displays the error message returned from the server
            }
            else //If everything was okay
            {
                //Displays the message returned from the server
                alert(response.message);
                location.reload();
            }
        }
    };
    //REQUEST TO WEBSERVICE
    xhttp.open("GET", Webservice_URL + "?method=removeFromCart&productId="+p_id+"&sessionId="+session_id, true);
    xhttp.send();
}
</script>

<div id="main" align="center" style="padding:50px">
    <?php 
        if($_SESSION['type']=="g"){
            echo '<div><p>You must sign in in order to view your purchases!</p></div>';
        }
        else{
            $signedInId = $_SESSION['id'];
            $sql = "SELECT p.product_name, c.amount, p.product_id FROM contains AS c, product AS p WHERE c.customer_id = ".$signedInId." AND c.product_id = p.product_id";
            $purchases = mysqli_query($con, $sql );
            //echo '<div><p>'.$purchases."</p></div>";
            echo '<table>';
            echo '<tr><th>Product</th><th>Amount</th><th>Remove</th></tr>';
            while($row = mysqli_fetch_array($purchases)){
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td><a href="Javascript:removeFromCart('.$row[2].','.$_SESSION["id"].')">Remove</a></td>';
                echo '</tr>';
            }
        }
        $itemCount = mysqli_query($con, "SELECT SUM(amount) FROM contains WHERE customer_id =".$_SESSION['id']);
        echo '<div><p>'.mysqli_fetch_array($itemCount)[0].' Items in your cart</p></div>';
        
        $totalQuery = 'SELECT SUM(c.amount * p.price) AS total FROM contains AS c JOIN product p ON p.product_id = c.product_id WHERE c.customer_id ='.$_SESSION['id'];
        $total = mysqli_query($con,$totalQuery);
        echo '<div><p>Your total is: $'.number_format(mysqli_fetch_array($total)[0],2).'</p></div>';      
    ?>
    <div id="checkoutPanel">
        <button onclick="window.location='paypal.php';">PayPal</button>
        <button onclick="window.location='credit.php'">Credit</button>
    </div>
</div>
<?php include("Footer.php"); ?>