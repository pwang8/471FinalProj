 <?php
    include("Header.php");

    $productID = $_POST['product_id'];
    
    
    if($productID != "")
    {

           
            $sql1= "DELETE FROM product WHERE product_id='".$productID."' ";
            //$sql2= "DELETE booking ";

            if (!mysqli_query($con,$sql2))
            {
                die('Error: ' . mysqli_error($con));
            }else {
                echo "<script>
                alert('Removed product ');
                window.location.href='http://localhost/471Finalproj/profile.php';
                </script>";
            }
        }    
    }
    else
    {
        echo "No such product exists.";
    }

    include("Footer.php");
?>