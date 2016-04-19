 <?php
    include("Header.php");

    $productID = $_POST['product_id'];
    
    $sql1= "DELETE FROM product WHERE product_id='".$productID."'"; 
    if (!mysqli_query($con,$sql1))
    {
        die('Error: ' . mysqli_error($con));
    }
    else
    {
        echo "<script>
        alert('Removed product');
        window.location.href='http://localhost/471FinalProj/adminOptions.php';
        </script>";
    }

    include("Footer.php");
?>