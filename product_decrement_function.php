<?php
    include("Header.php");

    $productID = $_POST['product_id'];
    $decrementValue = $_POST['decrement'];
    
    if($stock = !mysqli_query($con, "SELECT stock FROM product WHERE product_id ='".$productID."'"))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        $stock[0] = $stock[0] - $decrementValue;
        $sql1= "UPDATE product SET 'stock' =  WHERE product_id='".$productID."'";
        if (!mysqli_query($con,$sql1))
        {
            die('Error: ' . mysqli_error($con));
        }
    }
    include("Footer.php");
?>