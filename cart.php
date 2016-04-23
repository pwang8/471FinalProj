<?php include("Header.php"); ?>


<div id="main" align="center" style="padding:50px">
    <?php 
        if($_SESSION['type']=="g"){
            echo '<div><p>You must sign in in order to view your purchases!</p></div>';
        }
        else{
            $signedInId = $_SESSION['id'];
            $sql = "SELECT p.product_name, c.amount FROM contains AS c, product AS p WHERE c.customer_id = ".$signedInId." AND c.product_id = p.product_id";
            $purchases = mysqli_query($con, $sql );
            //echo '<div><p>'.$purchases."</p></div>";
            echo '<table>';
            echo '<tr><th>Product</th><th>Amount</th><th>Remove</th></tr>';
            while($row = mysqli_fetch_array($purchases)){
                echo '<tr>';
                echo '<td>'.$row[0].'</td>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>Remove button HERE</td>';
                echo '</tr>';
            }
        }
        echo '<div><p>SELECT COUNT(*) FROM contains WHERE customer_id ='.$_SESSION['id'].'</p></div>';
        $itemCount = mysqli_query($con, "SELECT SUM(amount) FROM contains WHERE customer_id =".$_SESSION['id']);
        echo '<div><p>'.mysqli_fetch_array($itemCount)[0].' Items in your cart</p></div>';
        
        $totalQuery = 'SELECT SUM(c.amount * p.price) AS total FROM contains AS c JOIN product p ON p.product_id = c.product_id WHERE c.customer_id ='.$_SESSION['id'];
        
        echo $totalQuery;
        $total = mysqli_query($con,$totalQuery);
        echo '<div><p>'.number_format(mysqli_fetch_array($total)[0],2).'</p></div>';      
    ?>
    
</div>   
<?php include("Footer.php"); ?>